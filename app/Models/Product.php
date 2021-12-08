<?php

namespace App\Models;
include 'functions.php';

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;

    public function money($money){
        return currency_format($money);
    }
}
