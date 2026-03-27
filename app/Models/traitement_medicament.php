<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class traitement_medicament extends Model
{
    public $table = 'traitement_medicaments' ;
    public $fillable = ['duree'];
}