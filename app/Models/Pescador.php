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

    public function adicionarPescador($request)
    {
        $pescador = Pescador::create([
            'name'       => $request->input('name'),
            'identidade' => $request->input('identidade'),
            'ativo'      => $request->input('ativo', true) // default true
        ]);

        return response()->json($pescador, 201);
    }
}
