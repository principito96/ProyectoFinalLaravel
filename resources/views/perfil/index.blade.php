<x-plantilla>
    <x-slot name="titulo">Gestion perfil</x-slot>
    <x-slot name="cabecera">Gestión de perfil</x-slot>
    <x-mensajes />
    <a href="{{ route('perfil.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Crear perfil</a>
    <table class="table table-bordered table-striped table-dark mt-2 text-center">
        <thead>
            <tr>
                <th scope="col">Detalle</th>
                <th scope="col">Nombre Perfil</th>
                <th scope="col">Descripcion</th>
                <th scope="col" colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perfil as $item)
                <tr>
                    <th scope="row">
                        <a href="{{ route('perfil.show', $item) }}" class="btn btn-info"><i class="fas fa-info"></i>Detalles</a>
                    </th>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td class="text-center">
                        <a href="{{ route('perfil.edit', $item) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                    </td>
                    <td class="text-center">
                        <form name="as" method="POST" action="{{ route('perfil.destroy', $item) }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{ $perfil->links() }}
    </div>
</x-plantilla>
