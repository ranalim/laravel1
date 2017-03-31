<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//https://www.youtube.com/watch?v=mL_7im7CBOE&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=42

class TagController extends Controller {
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
		//
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'New Tag was succesfully created!');

        return redirect()->route('tags.index');

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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
