<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <script s></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pakar</title>
</head>
<body class="text-center ">
    <div class="container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Sistem Pakar</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            {{-- <a class="nav-link" href="{{ route('FormLogin') }}">Login</a> --}}
          </nav>
        </div>
      </header>
      <main role="main" class="inner cover">
        {{-- <div class="container"> --}}
            @yield('content')
        {{-- </div> --}}
      </main>
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p></p>
        </div>
      </footer>
    </div>
</body>
</html>
