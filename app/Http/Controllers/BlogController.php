<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller {

//  https://www.youtube.com/watch?v=SkVgSOUUGvg&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=30
    public function getIndex(){
        $posts = Post::paginate(5);
        $posts->setPath('http://localhost:8181/laravel/blog1/public/blog');

        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){
//        https://www.youtube.com/watch?v=VqewG1lcjKw&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=28
        // fetch from the DB based on slug
        $post = Post::where('slug','=',$slug)->first();

        // return the view and pass in the post object
        return view('blog.single')->withPost($post);
    }

}
