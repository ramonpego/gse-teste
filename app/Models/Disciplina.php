<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
    protected $fillable = ['nome','descricao'];

    public function professor()
    {
        return $this->belongsTo(User::class);
    }

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }


}
