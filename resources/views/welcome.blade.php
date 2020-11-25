<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href=" {{asset('css/app.css')}} ">

        <title>Components VueJS - Laravel</title>

    </head>
    <body>
        
        <main id="app">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                       <Idea></Idea>
                    </div>
                </div>
            </div>
        </main>
        

        <script src=" {{asset('js/app.js')}} "></script>
    </body>
</html>
