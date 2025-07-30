@extends('layout.dashboard')
@section('contenido')
<div class="container mt-4">
    <div class="row">
        <!-- Columna izquierda: Tabla -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de parroquias</div>
                <div class="card-body">

                    <!-- Buscador -->
                    <form action="#" method="GET" class="d-flex flex-grow-1 mb-3">
                        <input name="buscar" class="form-control me-2 w-100" type="search" placeholder="Buscar por nombre de parroquia" value="{{ request('buscar') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>

                    <!-- Tabla -->
                    <table class="table table-sm table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Lugar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($parroquias as $item)
                                <tr>
                                    <td class="text-wrap">{{ $item->nom_parroquia }}</td>
                                    <td class="text-wrap">{{ $item->dir_parroquia }}</td>
                                    <td class="text-wrap">{{ $item->lugar }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-clipboard-list"></i></a>
                                        <a href="{{ route('parroquias.edit', $item->idParroquias) }}" class="btn btn-outline-warning"><i class="fa-solid fa-user-pen"></i></a>
                                        <form action="{{ route('parroquias.destroy', $item->idParroquias) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No hay datos en la tabla...</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Formulario -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $Texto }} Parroquia</div>
                <div class="card-body">
                    <form action="{{ $Texto === 'Crear' ? route('parroquias.store') : route('parroquias.update', $parroquia->idParroquias) }}" method="POST">
                        @csrf
                        @if($Texto !== 'Crear')
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="nom_parroquia">Nombre</label>
                            <input type="text" name="nom_parroquia" class="form-control rounded-0" value="{{ $parroquia->nom_parroquia ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="dir_parroquia">Dirección</label>
                            <input type="text" name="dir_parroquia" class="form-control rounded-0" value="{{ $parroquia->dir_parroquia ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="lugar">Lugar</label>
                            <input type="text" name="lugar" class="form-control rounded-0" value="{{ $parroquia->lugar ?? '' }}">
                        </div>
                        <div class="text-end">
                            @if ($Texto === 'Actualizar')
                                <a href="{{ route('parroquias.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            @endif
                            <button type="submit" class="btn btn-outline-primary">{{ $Texto }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
