<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'animal';

    protected $fillable = ['name', 'type', 'nick', 'picture_path'];
}
