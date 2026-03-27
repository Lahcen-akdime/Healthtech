<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Traitement extends Model
{
    /** @use HasFactory<\Database\Factories\TraitementFactory> */
    use HasFactory;
    public $fillable = ['name','description','doctorName'];
    public function medicaments() : BelongsToMany {
        return $this->belongsToMany(Medicaments::class);
    }
}
