<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://jenil.github.io/bulmaswatch/slate/bulmaswatch.min.css">
    <link rel="stylesheet" href="./css/style.css">
    @yield('head')
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="container">
    @yield('content')
    </div>   
  </body>
</html>
