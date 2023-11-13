<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content',
    ];

    public static function allNote(){

        return Note::all();

    }

    public static function createNote($request){

        $creating = new Note();

        $creating->title = $request->input('title');

        $creating->content = $request->input('content');

        return $creating->save();

    }

    public static function singleNote($request){

        return Note::where('id' , $request->input('id'))->first();

    }

    public static function updateNote($request){

        $item = Note::where('id', $request->input('id'))->first();

        $request['title'] = $request->input('title');

        $request['content'] = $request->input('content');

        return $item->update($request);

    }

    public static function deleteNote($request){

        return Note::whereId($request->input('id'))->delete();

    }
}
