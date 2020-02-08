<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//Post::orderBy('title','desc')->get();
		return view('posts.index', ['posts' => Post::latest()->paginate()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('posts.create', ['post' => new Post]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['user_id' => auth()->user()->id]);
		$fields = request()->validate([
			'user_id'   => 'required',
			'title'     => 'required',
			'body'      => 'required',
			'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		if ($request->hasfile('image_url')) {
			$file = $request->image_url->getClientOriginalName();
			// Get just filename
			$name = pathinfo($file, PATHINFO_FILENAME);
			// Get just ext
			$extension = $request->image_url->getClientOriginalExtension();
			// Filename to store
			$fileNameToStore = $name . '_' . date('YmdHis') . '.' . $extension;
			// Upload Image
			$request->image_url->move(public_path('images'), $fileNameToStore);
			$fields['image_url'] = $fileNameToStore;
		}

		Post::create($fields);
		return redirect()->route('posts.index')->with('success', 'Post was created successfully!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  object  $post
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post)
	{
		return view('posts.show', ['post' => $post]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  obj  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		if (auth()->user()->id === $post->user_id) {
			return view('posts.edit', ['post' => $post]);
		} else {
			return redirect()->route('posts.index');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param    $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Post $post)
	{
		$request->request->add(['user_id' => auth()->user()->id]);
		$fields = request()->validate([
			'user_id'   => 'required',
			'title'     => 'required',
			'body'      => 'required',
			'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		if ($request->hasfile('image_url')) {
			//Get previous image
			$img = public_path('images\\' . $post->image_url);
			//if(File::exists($img){
			//if($post->exists($img)){
			if (file_exists($img)) {
				//File::delete('public/images/'.$post->image_url);
				@chmod($img, 0755);
				//@unlink($img);
				unlink($img);
			}
			$file = $request->image_url->getClientOriginalName();
			// Get just filename
			$name = pathinfo($file, PATHINFO_FILENAME);
			// Get just ext
			$extension = $request->image_url->getClientOriginalExtension();
			// Filename to store
			$fileNameToStore = $name.'_'.date('YmdHis').'.'.$extension;
			// Upload Image
			$request->image_url->move(public_path('images'), $fileNameToStore);
			$fields['image_url'] = $fileNameToStore;
		}

		$post->update($fields);
		//return redirect()->route('posts.edit')->with('success','Post was successfully updated!');
		return back()->with('success', 'Post was successfully updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post)
	{
		if (auth()->user()->id === $post->user_id) {
			//get previous image
			$img = public_path('images\\'.$post->image_url);
			if (file_exists($img)) {
				//File::delete('public/images/'.$post->image_url);
				@chmod($img, 0755);
				//@unlink($img);
				unlink($img);
			}
			$post->delete();
			return redirect()->route('posts.index')->with('success', 'Post was successfully deleted!');
		} else {
			return redirect()->route('posts.index');
		}
	}
}