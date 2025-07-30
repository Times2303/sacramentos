@extends('layout.dashboard')
@include('modules.ceremonia.CreateCeremonia')
@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Bienvenido al panel de Misas</div>
                <div class="card-body">
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNuevaCeremonia">
                        Nueva Misa <i class="fa-solid fa-plus"></i>
                    </a>
                    <hr>
                    <form action="#" method="GET" class="d-flex flex-grow-1">
                        <input name="buscar" class="form-control me-2 w-100" type="search" placeholder="Buscar por fecha, parroquia o sacerdote" value="{{ request('buscar') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>

                    <hr>
                    <table class="table table-sm table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Observación</th>
                                <th>Parroquia</th>
                                <th>Sacerdote</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($ceremonia as $item)
                            <tr>
                                <td>{{ $item->fec_ceremonia }}</td>
                                <td>{{ $item->observacion }}</td>
                                <td>{{ $item->parroquia->nomparroquia }}</td>
                                <td>{{ $item->sacerdote->persona->nombres }}</td>
                                <td>
                                    <form action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <a href="#" class="btn btn-outline-info "><i class="fa-solid fa-clipboard-list"></i></a>
                                        <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-user-pen"></i></a>
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
                        <div class="d-flex justify-content-end">
                            {{ $ceremonia->links() }} {{-- ya que solo muestra 10 registros, esto hace que haya una paginacion --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection