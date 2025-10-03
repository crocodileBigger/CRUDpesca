<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peixe;
use App\Models\Pescador;

class PescadorController extends Controller
{
    // Lista todos os peixes de um pescador a partir do seu ID
    public function pescadorPeixes($id)
    {
        return (new Peixe()->todosPeixesDePescador($id));
    }

    // Retorna um único pescador pelo ID
    public function idDoPescador($id)
    {
        return (new Pescador()->pegaUnicoPescador($id));
    }

    // Lista pescadores filtrando se estão ativos (1) ou desativados (0)
    public function pescadorAtivoOuDesativado($num)
    {
        return (new Pescador()->pescadoresAtivosOuDesativados($num));
    }

    //adiciona um pescador no banco
    public function adicionarPescador(Request $request)
    {
        // Validação básica
        $request->validate([
            'name'       => 'required|string|max:255',
            'identidade' => 'required|string|unique:pescadors,identidade',
            'ativo'      => 'boolean'
        ]);

        return (new Pescador())->adicionarPescadorNoBanco($request);
    }

    //atualizar um pescador no banco
    public function atualizarPescador($id, Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'identidade' => 'required|string|unique:pescadors,identidade',
            'ativo'      => 'boolean'
        ]);

        return (new Pescador()->atualizarPeixeNoBanco($id, $request));
    }

    //deletar pescador do banco
    public function pescadorDeletarPorId($id)
    {
        return (new Pescador()->deletarPescador($id));
    }
}
