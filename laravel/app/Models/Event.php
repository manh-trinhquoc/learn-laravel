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
    use Sluggable, SluggableScopeHelpers;

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
            if (!in_array(strtolower($word), $ignore)) {
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

    public function scopeWithStatesTable($query)
    {
        return $query->leftjoin('states', 'state_id', '=', 'states.id')
            ->addSelect('states.id as state_id')
            ->addSelect('states.name as state_name')
            ->addSelect('states.abbreviation as state_abbr')
            ->addSelect('events.id as id')
            ->addSelect('events.name as name')
        ;
    }

    public function scopeWithCategoriesTable($query)
    {
        return $query->leftjoin('categories', 'category_id', '=', 'categories.id')
            ->addSelect('categories.id as category_id')
            ->addSelect('categories.name as category_name')
            ->addSelect('events.id as id')
            ->addSelect('events.name as name')
        ;
    }

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
        return $this->belongsTo('App\Models\State');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withPivot('comment')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
