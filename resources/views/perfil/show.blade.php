<x-plantilla>
    <x-slot name="titulo">Detalles</x-slot>
    <x-slot name="cabecera">Detalles perfiles ({{ $perfil->id }})</x-slot>
    <div class="card m-auto" style="width: 30rem;">
        <div class="card-body">
            <h3 class="card-title">ROL: {{ $perfil->nombre }}</h3>
            <h6 class="card-subtitle mb-2 text-muted">Descripción: {{ $perfil->descripcion }}</h6>
            <h5 class="card-subtitle mb-2">Usuarios: </h5>
            @foreach ($perfil->usuarios as $item)
                <li class="list-group-item list-group-item-success">
                    <a href="{{ route('usuarios.show', $item) }}">{{ $item->nomusu }}</a>
                </li>
            @endforeach
            </p>
            <div class="mt-2">
                <a href="{{route('perfil.index')}}" class="ml-3 btn btn-primary"><i class="fas fa-backward"></i></a>
            </div>
        </div>
    </div>

</x-plantilla>
