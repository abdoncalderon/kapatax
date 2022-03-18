<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Note;
use App\Models\Folio;
use App\Models\LocationProjectUser;
use App\Models\Location;
use App\Http\Requests\Workbook\StoreNoteRequest;
use App\Http\Requests\Workbook\UpdateNoteRequest;
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
            $location = Location::find(1);
            $notes = Note::join('folios','notes.folio_id','=','folios.id')
                                ->join('location_project_users','folios.location_id','=','location_project_users.location_id')
                                ->where('location_project_users.project_user_id',current_user()->id)
                                ->where('folios.location_id',0)
                                ->get();
        }else{
            $location = Location::find($location_id);
            $notes = Note::select('notes.id as id','locations.name as location','folios.date as date','turns.name as turn','notes.status as status','people.fullName as person','project_users.id as project_user_id')
                                ->join('folios','notes.folio_id','=','folios.id')
                                ->join('location_project_users','folios.location_id','=','location_project_users.location_id')
                                ->join('locations','folios.location_id','=','locations.id')
                                ->join('turns','notes.turn_id','=','turns.id')
                                ->join('project_users','notes.project_user_id','=','project_users.id')
                                ->join('users','project_users.user_id','=','users.id')
                                ->join('people','users.person_id','=','people.id')
                                ->where('location_project_users.project_user_id',current_user()->id)
                                ->where('folios.location_id',$location_id)
                                ->get();
        }
        return view('workbooks.notes.index')
        ->with(compact('notes'))
        ->with(compact('location'));
    }

    public function filterLocation(Request $request)
    {
        $location_id = $request->location;
        return redirect()->route('notes.index',$location_id);
    }

    public function create(Folio $folio)
    {
        return view('workbooks.notes.create')
        ->with('folio',$folio);
    }


    public function store(StoreNoteRequest $request)
    {
        try{
            $folio=Folio::find($request->folio_id);
            if (is_valid_date_for_create_note($folio->date, $folio->location)){
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
        return view('workbooks.notes.show')
        ->with('note',$note);
    }

    public function edit(Note $note)
    {
        return view('workbooks.notes.edit')
        ->with('note',$note);
    }

    public function update(Note $note, UpdateNoteRequest $request)
    {
        $note->update($request->validated());
        if ($request->status==1){
            $locationProjectUsersReceiveNotification = LocationProjectUser::where('location_id',$note->folio->location_id)->where('receive_notification',1)->get();
                foreach ($locationProjectUsersReceiveNotification as $locationProjectUser){
                    Mail::to($locationProjectUser->projectUser->user->email)->queue(new NoteCreated($note));
                }
        }
        return redirect()->route('notes.index',$note->folio->location->id);
    }
}
