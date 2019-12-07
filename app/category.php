<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    protected $filltable = ['id','name'];
    public $timestamps = false;
}
