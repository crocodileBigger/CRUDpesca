<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pescador extends Model
{
    use HasFactory;
    protected $table = 'Pescador';
    protected $fillable = ['name', 'identidade', 'ativo'];

    //pega todos os pescadores do evento que estão participando
    public function pescadoresAtivosOuDesativados($num)
    {
        return Pescador::where('ativo', $num)->get();
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

    public function pegaUnicoPescador($id)
    {
        return Pescador::where('id', $id)
            ->get();
    }

    //adicionar pescador no banco
    public function adicionarPescadorNoBanco($request)
    {
        $pescador = Pescador::create([
            'name'       => $request->input('name'),
            'identidade' => $request->input('identidade'),
            'ativo'      => $request->input('ativo', true) // default true
        ]);

        return response()->json($pescador, 201);
    }

    //Atualizar um peixe
    public function atualizarPeixeNoBanco($id, $request)
    {
        $pescador = Pescador::find($id);

        if ($pescador) {
            $pescador->update([
                'name'       => $request->input('name', $pescador->name),
                'identidade' => $request->input('identidade', $pescador->identidade),
                'ativo'      => $request->input('ativo', $pescador->ativo),
            ]);

            return response()->json([
                'mensagem'   => 'Pescador atualizado com sucesso.',
                'pescador'   => $pescador
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Pescador não encontrado.'
            ], 404);
        }
    }

    public function deletarPescador($id)
    {
        // Procura o peixe pelo ID
        $pescador = Pescador::find($id);

        // Verifica se o peixe existe
        if ($pescador) {
            $pescador->delete(); // deleta o registro
            return response()->json([
                'mensagem' => 'pescador deletado com sucesso.'
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Pescador não encontrado.'
            ], 404);
        }
    }
}
