<?php

namespace Database\Factories;

use App\Models\Peixe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peixe>
 */
class PeixeFactory extends Factory
{
    /**
     * O modelo associado à factory.
     *
     * @var string
     */
    protected $model = Peixe::class;

    /**
     * A lista de lugares de pesca a serem usados.
     * @var array
     */
    protected $lugares = [
        'Pantanal',
        'Amazônia',
        'Araquaia',
        'Ubatuba',
        'Rio São Francisco',
        // Adicione quantos nomes precisar
    ];

    /**
     * A lista de espécies de peixes a serem usados.
     * @var array
     */
    protected $especies = [
        'Dourado',
        'Pintado',
        'Jaú',
        'Pacu',
        'Pirarara',
        'Pirarucu',
        'Bicuda',
        'Garoupa',
        // Adicione quantos nomes precisar
    ];


    protected static $indexcount = 0;
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $index = self::$indexcount;
        self::$indexcount++; // Incrementa para o próximo registro

        // 2. Aplica a lógica do Módulo (%)
        $especie = $this->especies[$index % count($this->especies)];
        $lugar   = $this->lugares[$index % count($this->lugares)];

        return [
            'especie' => $especie,
            'lugar'   => $lugar,
            'tamanho' => $this->faker->randomFloat(2, 0, 100),
            'peso'    => $this->faker->randomFloat(2, 0.1, 50.0),
            'Pescador_id' => \App\Models\Pescador::factory(), // cria um peixe fake também
        ];
    }
}
