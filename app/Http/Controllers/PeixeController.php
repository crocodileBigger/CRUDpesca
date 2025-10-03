<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peixe;

class PeixeController extends Controller
{
    //pega todos os peixes do evento
    public function todosPeixes()
    {
        return (new Peixe())->especieObitidas();
    }

    //lista de lugares onde teve os peixes obitidos em base do lugar
    public function lugaresOndeTemPeixe($lugar)
    {
        return (new Peixe())->lugarePeixesObitidos($lugar);
    }

    //lista de todos os lugares
    public function lugares()
    {
        return (new Peixe())->todosLugares();
    }

    //listar todos os peixes de um pescador em base do seu id
    public function pescadorPeixes($id)
    {
        return (new Peixe()->todosPeixesDePescador($id));
    }
}
