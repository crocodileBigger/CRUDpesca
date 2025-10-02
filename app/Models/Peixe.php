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

    //lista de lugares onde teve os peixes obitidos
    public function lugarePeixesObitidos($lugares)
    {
        return Peixe::where('lugar', $lugares)->get();
    }
    //lista de todos os lugares
    public function todosLugares()
    {
        return Peixe::pluck('lugar');
    }
}
