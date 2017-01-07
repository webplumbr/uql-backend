<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'library';

    public $timestamps = false;

    protected $fillable = ['id', 'code', 'abbr', 'name', 'url'];
}
