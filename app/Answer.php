<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'user_id', 'question_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the question that owns the answer.
     */
    public function question()
    {
        return $this->belongsTo(\App\Question::class);
    }

    /**
     * Get the user that owns the answer.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
