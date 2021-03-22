<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Disciplina::factory(5)->create();
    }
}
