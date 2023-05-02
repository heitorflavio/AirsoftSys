<?php

namespace Database\Factories;

use App\Models\Patentes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatentesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patentes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $patentes = [
            ['Recruta', 'img/recruta.gif'],
            ['Cabo', 'img/cabo.gif'],
            ['Primeiro-Sargento', 'img/primeiro-sargento.gif'],
            ['Segundo-Sargento', 'img/segundo-sargento.gif'],
            ['Terceiro-Sargento', 'img/terceiro-sargento.gif'],
            ['Primeiro-Tenente', 'img/primeiro-tenente.gif'],
            ['Segundo-tenente', 'img/segundo-tenente.gif'],
            ['Capitão', 'img/capitao.gif'],
            ['Major', 'img/major.gif'],
            ['Tenente-Coronel', 'img/tenente-coronel.gif'],
            ['Coronel', 'img/coronel.gif'],
            ['General', 'img/general.gif'],
            ['Comandante', 'img/comandante.gif'],
            ['Soldado', 'img/soldado.gif'],
        ];

        $patente = $this->faker->unique()->randomElement($patentes);

        return [
            'nome' => $patente[0],
            'imagem' => $patente[1],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
