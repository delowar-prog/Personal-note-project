<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){
        $notes=Note::all();
        return view('crud.index', compact('notes'));
    }
    public function create(){
        return view('crud.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
       Note::saveNote($request);
       return back()->with('message','Note Added Successfully..');
    }
    public function show($id){
        $singlenote=Note::find($id);
        return view('crud.details', compact('singlenote'));
    }
    public function destroy(Request $request){
        $note_id=$request->note_id;
        $getNote=Note::find($note_id);
        if($getNote && $getNote->photo!=null){
            unlink($getNote->photo);
        }
        $getNote->delete();
        return back()->with('message','Note Deleted Successfully..');
    }
    public function edit($id){
        $note=Note::find($id);
        return view('crud.edit', compact('note'));
    }
    public function update(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
       Note::updateNote($request);
       return redirect()->route('home')->with('message','Note updated Successfully..');
    }
}
