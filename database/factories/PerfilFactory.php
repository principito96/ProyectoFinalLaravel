<?php

namespace Database\Factories;

use App\Models\Perfil;
use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerfilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perfil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->randomElement(['Super Admin','Administrador','Editor','Autor','Colaborador','Suscriptor']),
            'descripcion' => $this->faker->text(),
        ];
    }
}
