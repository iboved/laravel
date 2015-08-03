<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

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
}
