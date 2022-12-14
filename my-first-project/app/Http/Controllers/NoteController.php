<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{

    //Display a listing of the resource

    // @return \Illuminate\Http\Response;

    public function index()
    {

        $notes = Note::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('notes.index')->with('notes', $notes);

    }

    // Show the form for creating a new rescource

    // @return \Illuminate\Http\Response;

    public function create()
    {
        return view('notes.create');
    }

    // Store a newly created resource in storage

    // @param \Illuminate\Http\Response $request;
    // @return \Illuminate\Http\Response;

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);

        Note::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text
        ]);

        return to_route('notes.index');
    }

    // @param int $id;
    // @return \Illuminate\Http\Response;

    public function show(Note $note)
    {
        if($note->user_id != Auth::id()) {
            return abort(403);
        }
        return view('notes.show')->with('note',$note);
    }

    // Show the form for editing the specified resources

    // @param int $id;
    // @return \Illuminate\Http\Response;

    public function edit(Note $note)
    {
        if($note->user_id != Auth::id()) {
            return abort(403);
        }
        return view('notes.edit')->with('note',$note);
    }

    // Update the specified resource in storage.

    // @param \Illuminate\Http\Request $request
    // @param int $id
    // @return \Illuminate\Http\Response

    public function update(Request $request, Note $note)
    {

        if($note->user_id != Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);

        $note->update([
            'title' => $request->title,
            'text' => $request->text
        ]);

        return to_route('notes.show', $note)->with('success','Note Updated Successfully');
    }

    // Remove the specified resource from storage

    // @param int $id
    // @return \Illuminate\Http\Response

    public function destroy(Note $note)
    {
        if($note->user_id != Auth::id()) {
            return abort(403);
        }

        $note->delete();

        return to_route('notes.index')->with('success', 'Note deleted successfully');
    }

    
}