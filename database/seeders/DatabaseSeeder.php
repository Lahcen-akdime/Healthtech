<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    Patient::create(
        [
            'name' => 'Ahmed',
            'age' => 30,
            'ville' => 'Rabat' ,
            'maladie' => 'Deprission'
        ]
    );
    }
}
