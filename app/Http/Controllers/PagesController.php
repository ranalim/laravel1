<?php
/**
 * Created by PhpStorm.
 * User: infitec
 * Date: 2017-03-15
 * Time: 오후 4:40
 * https://www.youtube.com/watch?v=C87Pc-xh3xg&index=4&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
 */
namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller{

    public function getInit(){
        return "You are in Init page";
    }

    public function getIndex(){
//        https://www.youtube.com/watch?v=xvPWtUpyHzM&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=25
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){
//        https://www.youtube.com/watch?v=m5QrPsivE-Y&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=5
        $first = 'Alex';
        $last = 'Curtis';

        $fullname = $first." ".$last;
        $email = 'alex@jacurits.com';
//        return view('pages.about')->with("fullname", $fullname);
//        return view('pages.about')->withFullname($fullname)->withEmail($email);
        $data['fullname'] = $email;
        $data['email'] = $fullname;
        return view('pages.about')->withData($data);
    }

    public function getContact(){
        return view('pages.contact');
    }


}