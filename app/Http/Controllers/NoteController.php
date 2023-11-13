<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\DeleteNoteRequest;
use App\Http\Requests\SingleNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index(){

        return Note::all();

    }

    public function create(CreateNoteRequest $request){

        $creating = new Note();

        $creating->title = $request->input('title');

        $creating->content = $request->input('content');

        return $creating->save();

    }

    public function single(SingleNoteRequest $request){

        return Note::where('id' , $request->input('id'))->first();

    }

    public function update(UpdateNoteRequest $request){

        $item = Note::where('id', $request->input('id'))->first();

        $request['title'] = $request->input('title');

        $request['content'] = $request->input('content');

        return $item->update($request);

    }

    public function delete(DeleteNoteRequest $request){

        return Note::whereId($request->input('id'))->delete();

    }
}
