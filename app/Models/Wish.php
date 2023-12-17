<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
    
     protected $fillable = [
        'user_id',
        'root_id',
        'root_user_id',
        'desired_departure_date_and_time',
        'desired_number_of_passengers',
        'desired_departure_point',
        'desired_arrive_point',
    ];
    use HasFactory;
    
    //  public function getOwn(){
    //     return $this::with('wish')->find(Auth::id())->wish();
    //  }
     
    //  public function getPost(){
    //     return $this::with('post')->find(post->user()->id===root_user_id);
    //  }
}
