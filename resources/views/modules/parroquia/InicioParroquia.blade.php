@extends('layout.dashboard')
@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Bienvenido al panel de parroquias</div>
                <div class="card-body">
                    <a href="{{ route('parroquias.create') }}" class="btn btn-outline-primary">Nueva parroquia <i class="fa-solid fa-plus"></i></a>
                    <hr>
                    <form action="#" method="GET" method="GET" class="d-flex flex-grow-1">
                        <input name="buscar" class="form-control me-2 w-100" type="search" placeholder="Buscar por nombre de parroquia" value="{{ request('buscar') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                    <hr>
                    <table class="table table-sm table-bordered text-center align-middle">
                        <thead>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Lugar</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @forelse ($parroquias as $item)
                                <tr>
                                    <td>{{ $item->nom_parroquia }}</td>
                                    <td>{{ $item->dir_parroquia }}</td>
                                    <td>{{ $item->lugar }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-user-pen"></i></a>
                                        <form action="#" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
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
    </div>
</div>
@endsection