<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Wish;

class Management extends Model
{
    protected $table = 'managements';
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function wish(){
        return $this->belongsTo(Wish::class);
    }
}
