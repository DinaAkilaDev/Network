<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorites extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id'
    ];
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Post(){
        return $this->belongsTo(Posts::class,'post_id');
    }
}
