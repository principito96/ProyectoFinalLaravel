<?php

namespace Database\Factories;

use App\Models\Perfil;
use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuarios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //pasamos el id de los perfiles
        $perfil=Perfil::get();
        //generamos datoa aleatorios con faker
        return [
            'nomusu' => $this->faker->unique()->userName(),
            'mail' => $this->faker->unique()->email,
            'localidad' => $this->faker->streetAddress,
            'perfil_id' => rand(1,sizeof($perfil))
        ];
    }
}
