<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    private static $note;
    public static function saveNote($request){
        Self::$note=new Note();
        Self::$note->title=$request->title;
        Self::$note->content=$request->content;
        Self::$note->photo=self::saveUrl($request);
        Self::$note->save();
    }

    public static function saveUrl($req){
        $image=$req->file('photo');
        if($image){
            $imageName=rand().'.'.$image->getClientOriginalExtension();
            $directory='upload-image/';
            $imageUrl=$directory.$imageName;
            $image->move($directory,$imageName);
            return $imageUrl;
        }else{
            return null;
        }
    }

    public static function updateNote($request){
        Self::$note=new Note();
        $updatedNote=Self::$note->find($request->note_id);
        $updatedNote->title=$request->title;
        $updatedNote->content=$request->content;
        if($request->file('photo')){
            if($updatedNote->photo!=null){
                unlink($updatedNote->photo);
            }
            $updatedNote->photo = self::saveUrl($request);
        }
        $updatedNote->save();
    }
}
