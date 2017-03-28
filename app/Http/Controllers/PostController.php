<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;
use Session;

//https://www.youtube.com/watch?v=_WUCOL-eV3o&index=11&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx

class PostController extends Controller {

//https://www.youtube.com/watch?v=d9jd9HbQ_CU&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=33
    //todo  this makes authentication enable
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// create a variable and store all the blog posts in it from the database
//        $posts = Post::all();

        // pagination
        // https://www.youtube.com/watch?v=CzoeFyIm9tc&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=24
        $posts = Post::orderBy('id','desc')->paginate(5);
        $posts->setPath('http://localhost:8181/laravel/blog1/public/posts');

        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// https://www.youtube.com/watch?v=El4yziFuygQ&index=12&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
        return view('posts.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
		//
//        https://www.youtube.com/watch?v=5j3fgiaSK4E&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=13

        // validate the data (how to prevent SQL injection)
            $this->validate($request, array(
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'=>'required'
            ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
//        https://www.youtube.com/watch?v=mM2bZiD06A0&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=27
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

//        https://www.youtube.com/watch?v=-FMecyZs5Cg&index=15&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
//        Session::put();
        Session::flash('success', 'The blog post was successfully save!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $post = Post::find($id);
//        return view('posts.show', array('post'=>$post));
        return view('posts.show')->withPost($post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//  https://www.youtube.com/watch?v=6TcnKqr7chU&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=21
        // same like create(view) -> store(database)
        // same like edit(view) -> update(database)

        //find the post in the database and save as a var
        $post = Post::find($id);

        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//  https://www.youtube.com/watch?v=kmCtXryFwDc&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=22

        // validate the data
        $post = Post::find($id);
        if($request->input('slug')==$post->slug){
            $this->validate($request, array(
                'title'=>'required|max:255',
                'body'=>'required'
            ));
        }else{
            $this->validate($request, array(
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'=>'required'
            ));
        }

        // save the data to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();

        // set flast data with success message
        Session::flash('success', 'This post was successfully saved.');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//  https://www.youtube.com/watch?v=D5-balLS_LM&index=23&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted');

        return redirect()->route('posts.index');
	}

}
