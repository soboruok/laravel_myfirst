<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Weaving extends Model
{
    //Eloquent will assume the "Flight" model stores records in the "flights" table. 
    //You may specify a "custom table" by defining a table property on your model:
    //protected $table = 'dailywork';
    protected $fillable = ['title', 'size','machine','packing','wiggle', 'color','qty','memo','created_at','cat'];

    
}
