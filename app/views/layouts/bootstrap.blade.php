<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}bootstrap/css/bootstrap.theme.min.css">
    <script type="text/javascript" src="{{URL::to('/')}}bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}bootstrap/js/bootstrap.min.js"></script>

    @yield('head')
    <h1>
      <br>

    </h1>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<p align="left">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="nav nav-pills">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>


          <a class="navbar-brand" href="/segveci/public/">Seguridad Vecinal</a>
          <a class="navbar-brand" href="/segveci/public/blog">Blog</a>
          <a class="navbar-brand" href="/segveci/public/contacto">Contactanos</a>
          <?php if (Auth::user()->guest()) {?>
          <a class="navbar-brand" href="/segveci/public/login">Iniciar sesion</a>
          <a class="navbar-brand" href="/segveci/public/register">Registrarme</a>
          <?php } else { ?>

          <a class="navbar-brand" href="/segveci/public/alertas/create">Generar Alerta</a>

          <div ALIGN="right" class="navbar-collapse collapse">
               {{Form::open(array(
                  "method" => "POST",
                  "action" => "HomeController@salir",
                  "role" => "form",
                  "class" => "navbar-form",
                ))}}
          <a href="/segveci/public/privado">
                {{Form::label(Auth::user()->get()->nombre, null, array('class' => 'btn btn-success btn-xs'))}}   </a>
                {{Form::input("submit", "", "Salir", array("class" => "btn-success btn-xs"))}}
                {{Form::close()}}
          </div>

            <?php } ?>



        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">


          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>

    </nav>
    <div class="container">


      @yield('content')

    </div> <!-- /.container -->


</p>
  </body>
</html>
