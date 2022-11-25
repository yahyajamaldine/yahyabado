<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Scripts -->
      <script src="{{ asset('js/dayjs.min.js') }}" defer></script>
     
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    </head>
      @yield('content')
</html>