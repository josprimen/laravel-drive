<!DOCTYPE html>
<html>
@include('layouts.header')
<body>

<header>
    <!-- Aquí puedes agregar el código para el encabezado de tu sitio -->
</header>

<div class="container">
    @yield('content')
</div>

<footer>
    <!-- Aquí puedes agregar el código para el pie de página de tu sitio -->
</footer>

@include('layouts.script')

</body>
</html>
