<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','title','body','image'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function comments()
    {
    	return $this->hasMany('\App\Comment');
    }
    
    public function getUserIdAttribute($value)
    {
    	$user = User::where('id',$value)->first();
    	return ucfirst($user->name);
    }

}
