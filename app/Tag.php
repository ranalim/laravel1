<?php namespace App;

use Illuminate\Database\Eloquent\Model;

//  https://www.youtube.com/watch?v=tSmap9D-KCk&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=41

class Tag extends Model {

	//
    public function posts(){
        return $this->belongsToMany('App\Post');
    }

}
