@extends('layout.dashboard')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/personal.css') }}">
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Bienvenido al panel de sacerdotes</div>
                <div class="card-body">
                    <a href="{{ route('sacerdotes.seleccionarPersona') }}" class="btn btn-outline-primary">Nuevo sacerdote <i class="fa-solid fa-plus"></i></a>
                    <hr>
                    <form action="#" method="GET" class="d-flex flex-grow-1" role="search">
                        <input type="text" name="buscar" class="form-control me-2 w-100" placeholder="Buscar por nombre o apellido o número de identidad" value="{{ request('buscar') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>

                    <hr>
                    <table class="table table-sm table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Número</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Jerarquia</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sacerdotes as $item)
                                <tr>
                                    <td>{{ $item->persona->tipoidentificacion->nom_tipo }}</td>
                                    <td>{{ $item->persona->numero_identificacion }}</td>
                                    <td>{{ $item->persona->nombres}}</td>
                                    <td>{{ $item->persona->apellido1 }} {{ $item->persona->apellido2}}</td>
                                    <td>{{ $item->jerarquia->nom_jerarquia }}</td>
                                    <td>
                                        <form action="{{ route('sacerdotes.destroy', $item->idSacerdotes) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="btn btn-outline-info "><i class="fa-solid fa-clipboard-list"></i></a>
                                            <a href="{{ route('sacerdotes.edit2', $item->idSacerdotes) }}" class="btn btn-outline-warning"><i class="fa-solid fa-user-pen"></i></a>
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No hay datos en la tabla...</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                        <div class="d-flex justify-content-end">
                            {{ $sacerdotes->links() }} {{-- ya que solo muestra 10 registros, esto hace que haya una paginacion --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection