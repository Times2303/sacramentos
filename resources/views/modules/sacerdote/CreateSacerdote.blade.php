{{-- ESTA SECCION ESTÁ HECHA PARA DESIGNAR SACERDOTE --}}
@extends('layout.dashboard')
@section('contenido')
    <div class="card">
        <div class="card-header">Nuevo SACERDOTE</div>
        <div class="card-body">
            <form action="{{ route('sacerdotes.crear', $id) }}" method="POST">
                @csrf
                @method('PUT')
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
                    <a href="{{ route('sacerdotes.seleccionarPersona') }}" class="btn btn-outline-secondary col-md-2 rounded-0">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary col-md-2 rounded-0">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection