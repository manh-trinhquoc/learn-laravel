<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function favorites()
    {
        return $this->hasManyThrough('App\Models\FavoriteEvent', 'App\Models\User');
    }
}
