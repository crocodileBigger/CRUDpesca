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


    public function adicionarPeixe(Request $request)
    {
        // Validação básica
        $request->validate([
            'especie'      => 'required|string|max:255',
            'lugar'        => 'required|string|max:255',
            'tamanho'      => 'required|numeric|min:0',
            'peso'         => 'required|integer|min:0',
            'Pescador_id'  => 'required|exists:pescadors,id' // precisa existir o pescador
        ]);

        return (new Peixe()->adicionarPeixeNoBanco($request));
    }

    // Atualizar um peixe
    public function atualizarPeixe($id, Request $request)
    {
        $request->validate([
            'especie'      => 'required|string|max:255',
            'lugar'        => 'required|string|max:255',
            'tamanho'      => 'required|numeric|min:0',
            'peso'         => 'required|integer|min:0',
            'Pescador_id'  => 'required|exists:pescadors,id' // precisa existir o pescador
        ]);

        return (new Peixe()->atualizarPeixeNoBanco($id, $request));
    }

    //deletar pescador do banco
    public function peixeDeletarPorId($id)
    {
        return (new Peixe()->deletarPeixe($id));
    }
}
