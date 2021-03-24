<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;

class AlunoTurmaController extends Controller
{

    /**
     * Pode ser chamado de Matricula Controller e os metodos chamarem Matricular, Desmatricular um aluno na turma
     * e ter metodos para desmatricular todos de uma turma ou desmatricular o aluno de todas as turmas.
     * Vou manter mais simples
     */
    public function attach(Aluno $aluno,Turma $turma)
    {
        try {
            $aluno->turmas()->attach($turma);
            return response($aluno->turmas(),201);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }


    public function detach(Aluno $aluno, Turma $turma)
    {
        try {
            $aluno->turmas()->detach($turma);
            return response($aluno->turmas(),204);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

}
