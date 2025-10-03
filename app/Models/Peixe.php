<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peixe extends Model
{
    use HasFactory;
    protected $table = 'Peixe';

    //pega todos os peixes do evento
    public function especieObitidas()
    {
        return Peixe::all();
    }

    //lista de lugares onde teve os peixes obitidos em base do lugar
    public function lugarePeixesObitidos($lugar)
    {
        return Peixe::where('lugar', $lugar)
            ->get();
    }

    //lista de todos os lugares
    public function todosLugares()
    {
        return Peixe::distinct()->pluck('lugar');
    }

    //listar todos os peixes de um pescador em base do seu id
    public function todosPeixesDePescador($id)
    {
        return Peixe::where('Pescador_id', $id)
            ->get();
    }
}
