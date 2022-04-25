<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('published', '=', 1);
        });
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'started_at',
        'deleted_at'
    ];

    public function getNameAttribute($value)
    {
        $ignore = ['a', 'and', 'at', 'but', 'for', 'in', 'the', 'to', 'with'];

        $name = explode(' ', $value);

        $modifiedName = [];

        foreach ($name as $word) {
            if (! in_array(strtolower($word), $ignore)) {
                $modifiedName[] = ucfirst($word);
            } else {
                $modifiedName[] = strtolower($word);
            }
        }

        return join(' ', $modifiedName);
    }

    public function occurringToday()
    {
        return $this->started_at->isToday();
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeZip($query, $zip)
    {
        return $query->where('zip', $zip);
    }

    public function scopeAttendees($query, $maximum)
    {
        return $query->where('max_attendees', $maximum);
    }

    use Sluggable, SluggableScopeHelpers;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function state()
    {
        return $this->belongsTo('App\Model\State');
    }

    public function users()
    {
        return $this->belongsToMany('App\Modal\User') ->withTimestamps();
    }
}