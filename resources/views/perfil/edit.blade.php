<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Gestión de perfil</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{ route('perfil.update', $perfil) }}" class=" p-4 bg-secondary text-light">
        @csrf
        @method("PUT")
        @bind($perfil)
        <x-form-input class="form-control" name="nombre" label="Nombre perfil" />
        <x-form-textarea class="form-control" cols="50" rows="10" name="descripcion" label="Descripcion" />
        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Actualizar</button>
            <button type="reset" class=" ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>Volver</button>
        </div>
    </form>
</x-plantilla>
