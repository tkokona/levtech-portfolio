<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wish extends Model
{
    use SoftDeletes;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
    
     protected $fillable = [
        'user_id',
        'post_id',
        'post_user_id',
        'desired_departure_date_and_time',
        'desired_number_of_passengers',
        'desired_departure_point',
        'desired_arrive_point',
    ];
    
    protected $dates = [
        'desired_departure_date_and_time'
    ];
    use HasFactory;
    
    //  public function getOwn(){
    //     return $this::with('wish')->find(Auth::id())->wish();
    //  }
     
    //  public function getPost(){
    //     return $this::with('post')->find(post->user()->id===root_user_id);
    //  }
}
