<!DOCTYPE html>
    <head>
    	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Document</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link rel='stylesheet' href="{{ elixir('css/all.css') }}">
    </head>
    <body>
        <div class="container">
            @include('partials.flash')

            @yield('content')
        </div>

       <script src="http://code.jquery.com/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
       <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
       <script>
           $('div.alert').not('.alert-important').delay(3000).slideUp(300);
       </script>

       @yield('footer')
    </body>
</html>