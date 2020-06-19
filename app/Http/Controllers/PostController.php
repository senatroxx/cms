<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Categorypost as Catpost;
use Illuminate\Http\Request;
use Validator;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index', [
            'posts' => Post::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            $this->SetStatusCode(404);
            return $this->RespondWithError($message);
        }else{
            $body = $request->body;
            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $body, $image);

            $explode = explode(',', str_replace(' ', '',$request->category));
            
            // dd(is_string($explode[0]));
            if (!is_string($explode[0])) {
                for ($i=0; $i < count($explode); $i++) {
                    Category::firstOrCreate(['name' => $explode[$i]]);
                }
            }

            $category_id = new Category;
            $category_id = $category_id->whereIn('name', $explode);
            $category = $category_id->get();

            $post_id = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'body' => $request->body,
                'image' => $image['src'] ?? NULL,
            ])->id;

            if (!is_string($explode[0])) {
                for ($y=0; $y < count($category); $y++) { 
                    Catpost::create([
                        'post_id' => $post_id,
                        'category_id' => $category[$y]->id,
                    ]);
                }
            }       

            return redirect()->route('post.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category_post = Catpost::where('post_id', $post->id)->get();

        for ($i=0; $i < count($category_post); $i++) { 
            $categoryy[] = $category_post[$i]->category_id;
        }
        $category_id = new Category;
        if (!empty($categoryy)) {
            $category_id = $category_id->whereIn('id', $categoryy);
            $category_mentah = $category_id->get();
            for ($y=0; $y < count($category_mentah); $y++) { 
                $category_mentah2[] = $category_mentah[$y]->name;
            }
            $category = implode(", ", $category_mentah2);
        }else{
            $category = '';
        }

        return view('admin.articles.edit', ['posts' => $post, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            $this->SetStatusCode(404);
            return $this->RespondWithError($message);
        }else{
            $body = $request->body;
            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $body, $image);

            $post->title = $request->title;
            $post->body = $request->body;
            $post->image = $image['src'];
            $post->save();

            return redirect()->route('post.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
