<x-plantilla>
    <x-slot name="titulo">Gestion usuarios</x-slot>
    <x-slot name="cabecera">Nuevo Usuario</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{ route('usuarios.store') }}" class=" p-4 bg-secondary text-light">
        @csrf
        <x-form-input class="form-control" name="nomusu" label="Nombre usuario" />
        <x-form-input class="form-control" name="mail" label="Mail" />
        <x-form-input class="form-control" name="localidad" label="Localidad" />
        <x-form-select class="form-control" name="perfil_id" :options="$usuario" label="Perfil:" />
        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enviar</button>
            <button type="reset" class=" ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>Volver</button>
        </div>
    </form>
</x-plantilla>
