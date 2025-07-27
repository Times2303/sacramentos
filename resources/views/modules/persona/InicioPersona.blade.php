@extends('layout.dashboard')

@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Bienvenido al panel de personas</div>
                <div class="card-body">

                    {{-- Condicionando el modo para las acciones de button --}}
                    @if (isset($modo) && $modo === 'sacerdote')
                        <a href="{{ route('sacerdotes.create') }}" class="btn btn-outline-primary">Nuevo sacerdote <i class="fa-solid fa-plus"></i></a>
                    @else
                        <a href="{{ route('personas.create') }}" class="btn btn-outline-primary">Nueva Persona <i class="fa-solid fa-plus"></i></a>
                    @endif
                    <hr>
                    <form action="{{ route('personas.index') }}" method="GET" class="d-flex flex-grow-1">
                        <input name="buscar" class="form-control me-2 w-100" type="search" placeholder="Buscar por nombre, apellido o número de identidad" value="{{ request('buscar') }}">
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
                                <th>Dirección</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($datos as $item)
                            <tr>
                                <td>{{ $item->tipoidentificacion->nom_tipo}}</td>
                                <td>{{ $item->numero_identificacion}}</td>
                                <td>{{ $item->nombres}}</td>
                                <td>{{ $item->apellido1}} {{ $item->apellido2}}</td>
                                <td>{{ $item->direccion}}</td>
                                <td>
                                    @if (isset($modo) && $modo === 'sacerdote')
                                        <a href="{{ route('sacerdotes.edit', $item->idPersonas) }}" class="btn btn-outline-secondary">Designar <i class="fa-solid fa-cross"></i></a>
                                    @else
                                        <form action="{{ route('personas.destroy', $item->idPersonas)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-outline-info "><i class="fa-solid fa-clipboard-list"></i></a>
                                        <a href="{{ route('personas.edit', $item->idPersonas) }}" class="btn btn-outline-warning"><i class="fa-solid fa-user-pen"></i></a>
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    @endif
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
                            {{ $datos->links() }} {{-- ya que solo muestra 10 registros, esto hace que haya una paginacion --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection