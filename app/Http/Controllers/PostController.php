<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        return view('post.create');
    }

    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with('post_created', 'Post has been created successfully');
    }

    public function allPost()
    {
        $posts = Post::orderBy('id', 'DESC')->get();

        return view('post.all', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::where('id', $id)->first();

        return view('post.show', compact('post'));
    }

    public function deletePost($id)
    {
        Post::where('id', $id)->delete();

        return back()->with('post_delete', 'Post has been deleted successfully');
    }

    public function editPost($id)
    {
        $post = Post::find($id);

        return view('post.edit', compact('post'));
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with('post_updated', 'Post has been updated successfully');
    }

    public function addComment($id)
    {
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = 'This is second comment';
        $post->comment()->save($comment);

        return 'Comment has been posted';
    }

    public function getCommentByPost($id)
    {
        $comments = Post::find($id)->comment;

        return $comments;
    }
}
