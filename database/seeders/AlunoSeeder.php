<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Aluno::factory(15)->create();
    }
}
