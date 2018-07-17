<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Audit;
use App\Note;
use Auth;

class NoteController extends Controller
{
    public function store(Request $request, Audit $audit)
    {
      $note = new Note;
      $note->audit_id = $audit->id;
      $note->user_id = Auth::id();
      $note->body = $request->body;
      $note->save();
        
      return back();
    }
}
