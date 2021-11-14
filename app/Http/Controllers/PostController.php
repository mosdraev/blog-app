<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Displays posts of the Author
     *
     * @return void
     */
    public function authorPosts()
    {
        $post = Post::where('author_id', Auth::user()->id)
            ->orderBy('id', 'DESC')->with('user', 'user.profile')->get();

        return view('post.index', [
            'post' => $post
        ]);
    }

    /**
     * View author post
     *
     * @return void
     */
    public function viewAuthorPost(Request $request)
    {
        $post = Post::where('id', $request->id)
            ->with('user', 'user.profile')->first();

        // Get previous post
        $previous = Post::select('id', 'title')->where('id', '<', $post->id)
            ->orderBy('id', 'DESC')->first();

        // Get next post
        $next = Post::select('id', 'title')->where('id', '>', $post->id)
            ->orderBy('id', 'ASC')->first();

        return view('post.view', [
            'post' => $post,
            'previous' => $previous,
            'next' => $next
        ]);
    }

    /**
     * Update form page for a post
     *
     * @return void
     */
    public function updateAuthorPost(Request $request)
    {
        $post = Post::where('id', $request->id)
            ->with('user')->first();

        return view('post.update', [
            'post' => $post
        ]);
    }

    /**
     * Create form page of a post
     *
     * @return void
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Function to save posts
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image_url'))
        {
            $file = $request->file('image_url');
            $imageName = date('Ymd_His').'_'.time() . '.' . $file->extension();
            $file->storePubliclyAs('public/images', $imageName);

            $validationRules = array_merge(Post::$postValidate, Post::$imageValidate);
        }
        else
        {
            $validationRules = Post::$postValidate;
        }

        $request->validate($validationRules);

        $post = Post::create([
            'author_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'status' => Post::$status[$request->status],
            'image_url' => $imageName
        ]);

        if ($post->exists)
        {
            return redirect(route('authorPost', ['id' => $post->id]));
        }
    }

    /**
     * Function to modify posts
     *
     * @param Request $request
     * @return void
     */
    public function modify(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image_url'))
        {
            $file = $request->file('image_url');
            $imageName = date('Ymd_His').'_'.time() . '.' . $file->extension();
            $file->storePubliclyAs('public/images', $imageName);

            $validationRules = array_merge(Post::$postValidate, Post::$imageValidate);
            $hasNewImage = true;
        }
        else
        {
            $validationRules = Post::$postValidate;
            $hasNewImage = false;
        }

        $request->validate($validationRules);

        $post = Post::findOrFail($request->id);

        if ($post->exists)
        {
            $status = Post::where('id', $request->id)
                ->update([
                    'author_id' => $request->author_id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'status' => Post::$status[$request->status],
                    'image_url' => ($hasNewImage) ? $imageName : $post->image_url,
                ]);

            if ($status)
            {
                return redirect(route('authorPost', ['id' => $post->id]));
            }
        }
    }

    /**
     * Function to delete posts
     *
     * @return void
     */
    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);

        if ($post->exists)
        {
            $status = $post->delete();

            if ($status)
            {
                return redirect(route('authorPosts'));
            }
        }
    }
}
