<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $fillable = ['cat', 'no', 'qty'];
}
