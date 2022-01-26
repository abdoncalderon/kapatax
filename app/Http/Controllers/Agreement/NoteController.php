<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Note;
use App\Models\Folio;
use App\Models\LocationUser;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Mail\NoteCreated;
use App\Mail\ReportCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;

class NoteController extends Controller
{
    public function index($location_id = null)
    {
        if (empty($location_id)){
            $notes = Note::join('folios','notes.folio_id','=','folios.id')
                                ->join('location_users','folios.location_id','=','location_users.location_id')
                                ->where('location_users.user_id',auth()->user()->id)
                                ->where('folios.location_id',0)
                                ->get();
        }else{
            $notes = Note::select('notes.id as id','locations.name as location','folios.date as date','turns.name as turn','notes.status as status','users.name as user','users.id as user_id')->join('folios','notes.folio_id','=','folios.id')
                                ->join('location_users','folios.location_id','=','location_users.location_id')
                                ->join('locations','folios.location_id','=','locations.id')
                                ->join('turns','notes.turn_id','=','turns.id')
                                ->join('users','notes.user_id','=','users.id')
                                ->where('location_users.user_id',auth()->user()->id)
                                ->where('folios.location_id',$location_id)
                                ->get();
        }
        return view('agreement.notes.index')
        ->with(compact('notes'))
        ->with(compact('location_id'));
    }

    public function filterLocation(Request $request)
    {
        $location_id = $request->location;
        return redirect()->route('notes.index',$location_id);
    }

    public function create(Folio $folio)
    {
        return view('agreement.notes.create')
        ->with('folio',$folio);
    }


    public function store(StoreNoteRequest $request)
    {
        try{
            $folio=Folio::find($request->folio_id);
            $date = strtotime($folio->date);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($date - $today)/60/60,0));
            if (($differenceInHours <= $folio->location->max_time_create_note)){
                $note = Note::create($request ->validated());
                return redirect()->route('notes.edit',$note)->with('messages',__('messages.recordsuccessfullystored'));
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.note'));
            }
            
            
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Note $note){
        return view('agreement.notes.show')
        ->with('note',$note);
    }

    public function edit(Note $note)
    {
        return view('agreement.notes.edit')
        ->with('note',$note);
    }

    public function update(Note $note, UpdateNoteRequest $request)
    {
        $note->update($request->validated());
        if ($request->status==1){
            $usersReceiveNotification = LocationUser::where('location_id',$note->folio->location_id)->where('receive_notification',1)->get();
                foreach ($usersReceiveNotification as $user){
                    Mail::to($user->user->email)->queue(new NoteCreated($note));
                }
        }
        return redirect()->route('notes.index');
    }
}
