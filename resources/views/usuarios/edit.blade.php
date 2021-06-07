<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Gestión de usuario</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{ route('usuarios.update', $usuario) }}" class=" p-4 bg-secondary text-light">
        @csrf
        @method("PUT")
        @bind($usuario)
        <x-form-input class="form-control" name="nomusu" label="Nombre usuario" />
        <x-form-input class="form-control" name="mail" label="Mail" />
        <x-form-input class="form-control" name="localidad" label="Localidad" />
        <x-form-select class="form-control" name="perfil_id" :options="$perfil" label="Perfil:" />
        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Actualizar</button>
            <button type="reset" class=" ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>Volver</button>
        </div>
    </form>
</x-plantilla>
