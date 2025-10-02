<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pescador extends Model
{
    use HasFactory;
    protected $table = 'Pescador';

    //pega todos os pescadores do evento que estão participando
    public function pescadoresAtivosId()
    {
        return Pescador::where('ativo', 1)->get();
    }

    //pega todos os pescadores que estão participando e que nao estao participando
    public function todosPescadores()
    {
        return Pescador::all();
    }
    //pega todos os peixe de um determinado pescador
    public function peixePegos($nomePescador)
    {
        return Peixe::where('Pescador', $nomePescador)->get();
    }
}
