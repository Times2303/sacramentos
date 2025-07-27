@extends('layout.dashboard')
@section('contenido')

<div class="card">
    <div class="card-header">Campos de Persona</div>
    <div class="card-body">
        <p class="texto-rojo">Recuerde llenar los campos obligatorios (*), todo lo demás puede actualizarlo después</p>
        <form action="{{ route('sacerdotes.store') }}" method="POST">
            @csrf
            {{--CARD DE PERSONAS--}}
            <div class="row">
                {{-- Columna izquierda --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tipo_identificacion">Tipo de identificación *</label>
                        <select class="form-select rounded-0" id="tipo_identificacion" name="tipo_identificacion">
                            <option selected disabled {{ old('tipo_identificacion') ? '' : 'selected' }}>Seleccione una opción</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->idTipoIdentificacion }}"
                                    {{ old('tipo_identificacion') == $tipo->idTipoIdentificacion ? 'selected' : '' }}>
                                    {{ $tipo->nom_tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="numero_identificacion">Número de identidad *</label>
                        <input type="text" class="form-control rounded-0" id="numero_identificacion" name="numero_identificacion" value="{{ old('numero_identificacion') }}">
                    </div>

                    <div class="mb-3">
                        <label for="nombres">Nombre completo *</label>
                        <input type="text" class="form-control rounded-0" id="nombres" name="nombres" value="{{ old('nombres') }}">
                    </div>

                    <div class="mb-3">
                        <label for="apellido1">Apellido Paterno *</label>
                        <input type="text" class="form-control rounded-0" id="apellido1" name="apellido1" value="{{ old('apellido1') }}">
                    </div>

                    <div class="mb-3">
                        <label for="apellido2">Apellido Materno *</label>
                        <input type="text" class="form-control rounded-0" id="apellido2" name="apellido2" value="{{ old('apellido2') }}">
                    </div>

                    <div class="mb-3">
                        <label for="fec_nacimiento">Fecha de Nacimiento *</label>
                        <input type="date" class="form-control rounded-0" id="fec_nacimiento" name="fec_nacimiento" value="{{ old('fec_nacimiento') }}">
                    </div>
                </div>

                {{-- Columna derecha --}}
                <div class="col-md-6">
                    <div class="mb-3 ">
                        <label for="celular">Número de Celular</label>
                        <input type="text" class="form-control rounded-0" id="celular" name="celular" value="{{ old('celular') }}">
                    </div>

                    <div class="mb-3 ">
                        <label for="email">Email</label>
                        <input type="text" class="form-control rounded-0" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="direccion">Dirección de su hogar *</label>
                        <input type="text" class="form-control rounded-0" id="direccion" name="direccion" value="{{ old('direccion') }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-header">Campos de SACERDOTE</div>

            <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jerarquia">Jerarquia *</label>
                            <select name="jerarquia" id="jerarquia" class="form-select rounded-0">
                                <option selected disabled {{ old('jerarquia') ? '' : 'selected' }}>Seleccione una opción</option>
                                @foreach ($jerarquias as $item)
                                    <option value="{{ $item->idJerarquias}}" >{{ $item->nom_jerarquia}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="parroquia">Parroquia *</label>
                            <select name="parroquia" id="parroquia" class="form-select rounded-0">
                                <option selected disabled {{ old('parroquia') ? '' : 'selected' }}>Seleccione una opción</option>
                                @foreach ($parroquias as $item)
                                    <option value="{{ $item->idParroquias}}" >{{ $item->nom_parroquia}}, {{$item->lugar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fec_inicio">Fecha de inicio *</label>
                            <input type="date" class="form-control rounded-0" id="fec_inicio" name="fec_inicio" value="{{ old('fec_inicio') }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="fec_final">Fecha de fin</label>
                            <input type="date" class="form-control rounded-0" id="fec_final" name="fec_final" value="{{ old('fec_final') }}">
                        </div>
                        
                    </div>
                </div>
                {{-- Botones --}}
            <div class="text-end mt-4">
                <a href="{{ route('sacerdotes.index') }}" class="btn btn-outline-secondary col-md-2 rounded-0">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary col-md-2 rounded-0">Registrar</button>
            </div>
        </form>
    </div>
</div>
{{--CARD DE SACERDOTES--}}

@endsection