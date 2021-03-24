<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable=['nome'];


    public function professor()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class);
    }

}
