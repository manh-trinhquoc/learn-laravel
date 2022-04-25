<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->hasMany('App\Model\Event');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function favorites()
    {
        return $this->hasManyThrough('App\Modal\FavoriteEvent', 'App\Modal\User');
    }
}