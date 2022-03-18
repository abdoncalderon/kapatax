<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use App\Models\AttachmentNote;
use App\Models\Note;
use App\Http\Requests\Workbook\StoreAttachmentNoteRequest;
use Exception;

class AttachmentNoteController extends Controller
{
    public function store(StoreAttachmentNoteRequest $request){
        try{
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/agreement/notes/attachments/',$filename);
                $request ->validated();
                AttachmentNote::create([
                    'note_id'=>$request->note_id,
                    'filename'=>$filename,
                    'description'=>$request->description,
                ]);
                $note = Note::find($request->note_id);
                return redirect()->route('notes.edit',$note);
            }else{
                return back()->withErrors('no File');
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(AttachmentNote $attachmentNote){
        $note = Note::find($attachmentNote->note_id);
        $filename = $attachmentNote->filename;
        $attachmentNote->delete();
        unlink(public_path().'/images/agreement/notes/attachments/'.$filename);
        return redirect()->route('notes.edit',$note);
    }
}
