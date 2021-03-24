<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [\App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
    Route::post('refresh', [\App\Http\Controllers\AuthController::class,'refresh'])->name('refresh');
    Route::post('me', [\App\Http\Controllers\AuthController::class,'me'])->name('me');
});


Route::middleware('auth:api')->group( function () {
    Route::apiResource('alunos',\App\Http\Controllers\AlunoController::class);
    Route::get('alunos/{user}/turmas/{turma}/attach',[\App\Http\Controllers\AlunoTurmaController::class,'attach'])->name('alunos.attach');//alunos.matricular
    Route::get('alunos/{user}/turmas/{turma}/detach',[\App\Http\Controllers\AlunoTurmaController::class,'detach'])->name('alunos.attach');//alunos.desmatricular

    Route::apiResource('disciplinas',\App\Http\Controllers\DisciplinasController::class);
    Route::apiResource('disciplinas.turmas',\App\Http\Controllers\DisciplinaTurmaController::class)->shallow();

    Route::get('professores/{user}/disciplinas',[\App\Http\Controllers\ProfessorDisciplinaController::class,'index'])->name('professores.disciplinas');
    Route::get('professores/{user}/alunos',[\App\Http\Controllers\ProfessorAlunoController::class,'index'])->name('professores.alunos');
    Route::apiResource('professores',\App\Http\Controllers\ProfessorController::class)->parameters([
        'professores' => 'user'
    ]);
    Route::apiResource('professores.turmas',\App\Http\Controllers\ProfessorTurmaController::class)->shallow()->parameters([
        'professores' => 'user'
    ]);
});
