<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('general/create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'unique:posts', 'max:80', 'regex:/^[a-zA-Z0-9\s\.\-\(\)\'\!\*\:\@\,\;]+$/i'],
            'body' => 'required|min:250',
            'thumbnail' => ['required', 'image']

        ], [
            'title.unique' => 'This title has already been taken',
            'title.max' => 'The title should not contain more than 80 characters',
            'title.regex' => "Title can contain only letters, numbers, and the following characters: - . _ ~ ( ) ' ! * : @ , ; ",
            'body.min' => 'Please write something descriptive, atleast 250 characters long!',
            'thumbnail.required' => "Please select an image that reflects your post's title",
            "thumbnail.image" => "Sorry, we don't support this type of files. Please make sure that your post thumbnail has valid image file format"
        ]);



        $thumbnail_path = $request->thumbnail->store('post-images', 'public');
        if ( //Condition to check if the post has been created successfully
            $thumbnail_path
            &&
            // Image::make("storage/".$thumbnail_path)->crop(900, 500)->save()
            // &&
            Post::create([
                'title' => $request->title,
                'post_body' => $request->body,
                'post_image_path' =>  $thumbnail_path,
                'user_id' => Auth::user()->id,
            ])
        ) { //Code of block to be evaluated if the post if created successfully
            return redirect('/')->with('creation_success_message', "Your post has been created successfully!");
        } else { //Code of block to be evaluated if something goes wrong while saving the post to the database
            return back()->withInput(['title', 'body'])->with('creation_failure_message', "Your post couldn't be created, please try again");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("general/show_post", ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->id !== $post->user->id) {
            return abort(404);
        }
        return view('general/edit_post', ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::user()->id !== $post->user->id) {
            return abort(404);
        }
        $request->validate([
            'title' => ['required',  Rule::unique('posts', 'title')->ignore($post), 'max:80', 'regex:/^[a-zA-Z0-9\s\.\-\(\)\'\!\*\:\@\,\;]+$/i'],
            'body' => 'required|min:250',
            'thumbnail' => ['image']

        ], [
            'title.unique' => 'This title has already been taken',
            'title.max' => 'The title should not contain more than 80 characters',
            'title.regex' => "Title can contain only letters, numbers, and the following characters: - . _ ~ ( ) ' ! * : @ , ; ",
            'body.min' => 'Please write something descriptive, atleast 250 characters long!',
            'thumbnail.image' => "Sorry, we don't support this type of files. Please make sure that your post thumbnail has valid image file format"
        ]);




        //Evaluate this block of code only if the request paramater has a thumbnail
        if (isset($request->thumbnail)) {
            $thumbnail_path = $request->thumbnail->store('post-images', 'public');

            if ( //Condition to check if the post is updated succussfully
                $thumbnail_path  &&
                $post->update([
                    'title' => $request->title,
                    'post_body' => $request->body,
                    'post_image_path' => $thumbnail_path,
                    'user_id' => Auth::user()->id,
                ])
            ) { //Code block to be evaluated if the post is updated successfully
                return redirect('/')->with('update_success_message', 'Your post has been updated!');
            } else { //Code block to be evaluated if the post update fails
                return redirect('/')->with('update_failure_message', "Sorry, your post couldn't be updated! Please try again later");
            }
        } else {
            if ( //Condition to check if the post is updated succussfully
                $post->update([
                    'title' => $request->title,
                    'post_body' => $request->body,
                    'user_id' => Auth::user()->id,
                ])
            ) { //Code block to be evaluated if the post is updated successfully
                return redirect('/')->with('update_success_message', 'Your post has been updated!');
            } else { //Code block to be evaluated if the post update fails
                return redirect('/')->with('update_failure_message', "Sorry, your post couldn't be updated! Please try again later");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::user()->id !== $post->user->id) {
            return abort(404);
        }
        if ($post->delete()) {
            return redirect('/')->with('deletion_success_message', 'Your post has been deleted');
        } else {
            return back()->with('deletion_failure_message', "Sorry, we couldn't delete your post! Please try again later");
        }
    }
}
