<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        .menu {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .menu a {
            display: block;
            margin: 8px 0;
            text-decoration: none;
            font-size: 1.1rem;
            color: #007bff;
            padding: 10px;
            border-left: 4px solid #007bff;
            background: #f8f9fa;
        }
        .menu a:hover {
            color: #000;
            background: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="menu">
        <h1>Bienvenido a tu sistema Laravel</h1>
        <p>Usa el menú para navegar entre las secciones.</p>
        
        <a href="{{ route('docentes.index') }}">📚 Docentes</a>
        <a href="{{ route('materias.index') }}">📖 Materias</a>
        <a href="{{ route('horarios.index') }}">⏰ Horarios</a>
        <a href="{{ route('muebles.index') }}">🪑 Muebles</a> {{-- CORREGIDO: muebles.index --}}
        <a href="{{ route('reservas.index') }}">📅 Reservas</a>
    </div>
</body>
</html>