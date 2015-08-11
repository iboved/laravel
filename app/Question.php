<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Question extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'active', 'user_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    /**
     * Get the answers for the question.
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * Get the user that owns the question.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the question's likes users.
     */
    public function likes()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Cascade delete
     */
    protected static function boot() {
        parent::boot();

        static::deleting(function ($question) {
            $question->answers()->delete();
        });
    }
}
