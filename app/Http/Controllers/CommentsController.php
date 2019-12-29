<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function index()
    {
        return Comment::all();
    }
    public function store(CommentRequest $request)
    {
        $data = $request->all();
        
        return Comment::create($data);
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
