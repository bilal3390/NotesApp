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

        Note::allNote();

    }

    public function create(CreateNoteRequest $request){

        Note::createNote($request);

    }

    public function single(SingleNoteRequest $request){

        Note::singleNote($request);

    }

    public function update(UpdateNoteRequest $request){

        Note::updateNote($request);

    }

    public function delete(DeleteNoteRequest $request){

        Note::deleteNote($request);

    }
}
