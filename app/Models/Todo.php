<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'desc',
        'status ',
        'updated_at ',
        'created_at ',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
