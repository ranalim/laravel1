<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	//  https://www.youtube.com/watch?v=oPc5ijQXq2s&index=37&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
    protected $table = 'categories';

    public function posts(){
                    // hasOne();
        return $this->hasMany('App\Post');
    }

}
