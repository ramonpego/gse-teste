<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(3)->create();
        $disciplina = Disciplina::factory()->create();
        $alunos = Aluno::factory()->count(5)->create();
        foreach ($users as $user) {
            Turma::factory()
                ->for($user, 'professor')
                ->for($disciplina)
                ->hasAttached($alunos)
                ->create();
        }

    }
}
