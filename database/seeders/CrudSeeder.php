<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crud;

class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 1000; $i++) {
        Crud::create([

            'name'=>fake()->name(),
            'email'=>fake()->unique()->email()
        ]);
    }
    }
}
