<x-plantilla>
    <x-slot name="titulo">Detalles</x-slot>
    <x-slot name="cabecera">Detalles usuarios ({{ $usuario->id }})</x-slot>
    <div class="card m-auto" style="width: 30rem;">
        <div class="card-body">
            <h3 class="card-title">{{ $usuario->nomusu }}</h3>
            <h6 class="card-subtitle mb-2 text-muted">{{ $usuario->localidad }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">{{ $usuario->mail }}</h6>
            <h5 class="card-subtitle mb-2">Perfil: </h5>
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">
                    <a href="{{ route('perfil.show', $usuario->perfil->id) }}" class="card-link">{{ $usuario->perfil->nombre }}</a>
                </li>
            </ul>
            <div class="mt-2">
                <a href="{{route('usuarios.index')}}" class="ml-3 btn btn-primary"><i class="fas fa-backward"></i></a>
            </div>
        </div>
    </div>

</x-plantilla>
