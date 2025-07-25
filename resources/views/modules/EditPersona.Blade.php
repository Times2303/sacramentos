@extends('layout.dashboard')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @section('contenido')
        <div class="card">
        <div class="card-header">Actualizar datos</div>
        <div class="card-body">
            <form action="{{ route('personas.update', $personas->idPersonas) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    {{-- Columna izquierda --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tipo_identificacion">Tipo de identificación</label>
                            <select class="form-select rounded-0" id="tipo_identificacion" name="tipo_identificacion">
                                <option disabled>Seleccione una opción</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->idTipoIdentificacion }}"
                                        @if ($tipo->idTipoIdentificacion == $personas->fkTipoIdentificacion) selected @endif>
                                        {{ $tipo->nom_tipo }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="numero_identificacion">Número de identificación</label>
                            <input type="text" class="form-control rounded-0" id="numero_identificacion" name="numero_identificacion" value="{{ $personas->numero_identificacion }}">
                        </div>

                        <div class="mb-3">
                            <label for="nombres">Nombre completo</label>
                            <input type="text" class="form-control rounded-0" id="nombres" name="nombres" value="{{ $personas->nombres }}">
                        </div>

                        <div class="mb-3">
                            <label for="apellido1">Apellido Paterno</label>
                            <input type="text" class="form-control rounded-0" id="apellido1" name="apellido1" value="{{ $personas->apellido1 }}">
                        </div>

                        <div class="mb-3">
                            <label for="apellido2">Apellido Materno</label>
                            <input type="text" class="form-control rounded-0" id="apellido2" name="apellido2" value="{{ $personas->apellido2 }}">
                        </div>

                        <div class="mb-3">
                            <label for="fec_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control rounded-0" id="fec_nacimiento" name="fec_nacimiento" value="{{ $personas->fec_nacimiento }}">
                        </div>
                    </div>

                    {{-- Columna derecha --}}
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="celular">Número de Celular</label>
                            <input type="text" class="form-control rounded-0" id="celular" name="celular" value="{{ $personas->celular }}">
                        </div>

                        <div class="mb-3 ">
                            <label for="email">Email</label>
                            <input type="text" class="form-control rounded-0" id="email" name="email" value="{{ $personas->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="direccion">Dirección de su hogar</label>
                            <input type="text" class="form-control rounded-0" id="direccion" name="direccion" value="{{ $personas->direccion }}">
                        </div>
                    </div>
                </div>

                {{-- Botones --}}
                <div class="text-end mt-4">
                    <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary col-md-2 rounded-0">Cancelar</a>
                    <button type="submit" class="btn btn-outline-warning col-md-2 rounded-0">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
