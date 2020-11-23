<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cape Chat</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
        <link href="css/chatbot.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <h1 class="title">Bienvenido</h1>
            <div class="content">
                <div class="logo">
                    <img src="https://videobeet-technologies.com/images/icon/icona1.gif" alt="Chatbot icon">
                </div>
            </div>
        </div>

        <script>
            var botmanWidget = {
                frameEndpoint: '/botman/chat',
                title: 'Smart TV Troubleshooting',
                introMessage: 'Hola, soy Cape Chat, estoy aquí para ayudarte a configurar tu Smart TV. Para mas informacion la palabra escribe <b>opciones</b>. <br />José Capellán (19-0821)',
                mainColor: '#0069c0',
                bubbleBackground: '#2E2E2E'
            };
        </script>

        <!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->
        <!-- <script src="{{asset('js/widget.js')}}"></script> -->
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">
        </script>

        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
        <script src="{{'js/chatbot.js'}}"></script>
    </body>
</html>