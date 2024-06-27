<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientReview extends Model
{
    use HasFactory;

    protected $guarded = []; //fillable moramo samo napisat sve parametre, ovdje se podrazumijeva
}
