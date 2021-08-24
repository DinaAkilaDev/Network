<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Post()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }

    public function likes()
    {
        return $this->hasMany(likes::class, 'type_id', 'id')->where('type', 'like');
    }
}
