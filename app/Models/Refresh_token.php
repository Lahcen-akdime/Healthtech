<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refresh_token extends Model
{
    protected $fillable = ['refresh_token','date','expires_at'];
    protected function casts(): array
    {
        return [
            'refresh_token' => 'hashed',
        ];
    }
}
