<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(likes::class, 'type_id', 'id')->where('type', 'post');
    }

    public function Comments()
    {
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }
}
