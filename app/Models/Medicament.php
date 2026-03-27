<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicaments extends Model
{
    public $fillable = ['name','description'];
    public function traitement() : BelongsToMany {
        return $this->belongsToMany(Traitement::class);
    }
}
