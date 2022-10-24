<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Tag;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        return view('admin.posts.index', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required|max:255',
                'description'=>'required|max:35565',
                'category_id'=>'nullable',
                'tags' => 'exists:tags,id'
            ]
            );

        $data = $request->all();

        $post= new Post();
        $post->fill($data);

        $slug = $this->generateSlug($post->title);
        $post->slug = $slug;

        $post->save();
        return redirect()->route('admin.posts.index');

        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:65535',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
        ]);

        $data = $request->all();

        if ($post->title !== $data['title']) {
            $data['slug'] = $this->calculateSlug($data['title']);
        }

        $post->update($data);

        if (array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->sync([]);
        }

        // return redirect()->route('admin.posts.index');
        return Redirect::to(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    protected function generateSlug($title){
        $slug = Str::slug($title, '-');
        $checkDuplicate = Post::where('slug', $slug)->first();
        $counter= 2;

        while($checkDuplicate){
            $slug = Str::slug($title . '-' . $counter);
            $counter++;
            $checkDuplicate = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
