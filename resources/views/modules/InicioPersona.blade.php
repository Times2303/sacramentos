@extends('layout.dashboard')

@section('contenido')
@if(session('success') || session('error'))
    <div id="custom-alert" class="position-fixed top-0 start-0 m-3 z-3 alert 
        {{ session('success') ? 'alert-success' : 'alert-danger' }} 
        fade show rounded-2 shadow" role="alert" style="min-width: 250px;">
        {{ session('success') ?? session('error') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('custom-alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 300);
            }
        }, 5000);
    </script>
@endif

<h3>Registro de personas</h3>
<a href="{{ route('personas.create') }}" class="btn btn-primary">Agregar Nueva Persona</a>


@endsection