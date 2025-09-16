<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
        <div>
            {{-- CORRIGE ESTAS LÍNEAS --}}
            <a href="{{ route('muebles.index') }}" class="btn btn-outline-light btn-sm me-2">Muebles</a>
            <a href="{{ route('reservas.index') }}" class="btn btn-outline-light btn-sm me-2">Reservas</a>
            <a href="{{ route('docentes.index') }}" class="btn btn-outline-light btn-sm">Docentes</a>
        <head>
    <!-- ... otras etiquetas ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- ... -->
</head>
</div>
    </div>
</nav>