@extends('layout.dashboard')
@section('contenido')
<div class="card">
    <div class="card-header">Actualizar Sacerdote</div>
    <div class="card-body">
        <form action="{{ route('sacerdotes.update2', $sacerdote->idSacerdotes) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    {{-- Jerarquía --}}
                    <div class="mb-3">
                        <label for="jerarquia">Jerarquía *</label>
                        <select name="jerarquia" id="jerarquia" class="form-select rounded-0">
                            <option disabled>Seleccione una opción</option>
                            @foreach ($jerarquias as $item)
                                <option value="{{ $item->idJerarquias }}"
                                    @if ($item->idJerarquias == $sacerdote->fkJerarquias) selected @endif>
                                    {{ $item->nom_jerarquia }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Parroquia --}}
                    <div class="mb-3">
                        <label for="parroquia">Parroquia *</label>
                        <select name="parroquia" id="parroquia" class="form-select rounded-0">
                            <option disabled>Seleccione una opción</option>
                            @foreach ($parroquias as $item)
                                <option value="{{ $item->idParroquias }}"
                                    @if ($item->idParroquias == $sacerdote->fkParroquias) selected @endif>
                                    {{ $item->nom_parroquia }}, {{ $item->lugar }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    {{-- Fecha de inicio --}}
                    <div class="mb-3">
                        <label for="fec_inicio">Fecha de inicio *</label>
                        <input type="date" class="form-control rounded-0" id="fec_inicio" name="fec_inicio"
                            value="{{ $sacerdote->fec_inicio }}">
                    </div>

                    {{-- Fecha de fin --}}
                    <div class="mb-3">
                        <label for="fec_final">Fecha de fin</label>
                        <input type="date" class="form-control rounded-0" id="fec_final" name="fec_final"
                            value="{{ $sacerdote->fec_final }}">
                    </div>
                </div>
            </div>

            {{-- Botones --}}
            <div class="text-end mt-4">
                <a href="{{ route('sacerdotes.index') }}" class="btn btn-outline-secondary col-md-2 rounded-0">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary col-md-2 rounded-0">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection
