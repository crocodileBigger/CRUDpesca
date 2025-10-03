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

    //adicionar peixe
    public function adicionarPeixeNoBanco($request)
    {
        $peixe = Peixe::create([
            'especie'     => $request->input('especie'),
            'lugar'       => $request->input('lugar'),
            'tamanho'     => $request->input('tamanho'),
            'peso'        => $request->input('peso'),
            'Pescador_id' => $request->input('Pescador_id')
        ]);

        return response()->json($peixe, 201);
    }

    //Atualizar um peixe
    public function atualizarPeixeNoBanco($id, $request)
    {
        $peixe = Peixe::find($id);

        if ($peixe) {
            $peixe->update([
                'especie'     => $request->input('especie', $peixe->especie),
                'lugar'       => $request->input('lugar', $peixe->lugar),
                'tamanho'     => $request->input('tamanho', $peixe->tamanho),
                'peso'        => $request->input('peso', $peixe->peso),
                'Pescador_id' => $request->input('Pescador_id', $peixe->Pescador_id)
            ]);

            return response()->json([
                'mensagem' => 'Peixe atualizado com sucesso.',
                'peixe' => $peixe
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Peixe não encontrado.'
            ], 404);
        }
    }

    //deletar um peixe do banco de dados
    public function deletarPeixe($id)
    {
        $peixe = Peixe::find($id);

        if ($peixe) {
            $peixe->delete();
            return response()->json([
                'mensagem' => 'Peixe deletado com sucesso.'
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Peixe não encontrado.'
            ], 404);
        }
    }
}
