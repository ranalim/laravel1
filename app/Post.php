<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	// https://www.youtube.com/watch?v=oPc5ijQXq2s&index=37&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
    public function category(){
        return $this->belongsTo('App\Category');
    }

//  https://www.youtube.com/watch?v=tSmap9D-KCk&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=41
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

}
