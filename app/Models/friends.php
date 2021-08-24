<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friends extends Model
{
    use HasFactory;
    protected $fillable = [
        'friend_id','user_id'
    ];
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id', 'user_id');
    }
}
