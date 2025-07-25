@extends('layout.dashboard')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/personal.css') }}">
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Registro de personas</div>
                <div class="card-body">
                    <a href="{{ route('personas.create') }}" class="btn btn-outline-primary">Nueva Persona <i class="fa-solid fa-plus"></i></a>
                    <hr>
                    <table class="table table-sm table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Número</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($datos as $item)
                            <tr>
                                <td>{{ $item -> tipoidentificacion->nom_tipo}}</td>
                                <td>{{ $item -> numero_identificacion}}</td>
                                <td>{{ $item -> nombres}}</td>
                                <td>{{ $item -> apellido1}}</td>
                                <td>{{ $item -> apellido2}}</td>
                                <td>
                                    <form action="{{ route('personas.destroy', $item->idPersonas)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-outline-info "><i class="fa-solid fa-clipboard-list"></i></a>
                                        <a href="{{ route('personas.edit', $item->idPersonas) }}" class="btn btn-outline-warning"><i class="fa-solid fa-user-pen"></i></a>
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
                            {{ $datos->links() }} {{-- ya que solo muestra 2 registros, esto hace que haya una paginacion --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection