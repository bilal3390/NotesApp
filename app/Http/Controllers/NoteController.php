<?php

namespace App\Http\Controllers;

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

    public function create(Request $request){

        $creating = new Note();

        $creating->title = $request->input('title');

        $creating->content = $request->input('content');

        return $creating->save();

    }

    public function single(Request $request){

        return Note::where('id' , $request->input('id'))->first();

    }

    public function update(Request $request){

        $item = Note::where('id', $request->input('id'))->first();

        $request['title'] = $request->input('title');

        $request['content'] = $request->input('content');

        return $item->update($request);

    }

    public function delete(Request $request){

        return Note::whereId($request->input('id'))->delete();

    }
}
