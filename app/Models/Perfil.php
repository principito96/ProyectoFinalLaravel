<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion'];

    public function usuarios(){
        return $this->hasMany(Usuarios::class);
    }
    //mostrar los perfiles
    public static function getArrayIdNombre(){
        $perfil = Perfil::orderBy('nombre')->get();
        $miArray = [];
        foreach($perfil as $item){
            $miArray[$item->id] = $item->nombre;
        }
        return $miArray;
    }
}
