
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  
    <title>@yield('title', 'Sistema Alerta')</title>

    <!-- Bootstrap core CSS -->

    {{ HTML::style('assets/js/modulos/bootstrap/css/bootstrap.min.css', array('media' => 'screen')) }}
    <!-- Custom styles for this template -->
    {{HTML::style("assets/css/admin/global.css")}}

    @if(isset($css_array))
        @foreach($css_array as $var)
            {{ HTML::style($var, array('media' => 'screen')) }}
        @endforeach;
    @endif

    @if(isset($css_print_array))
        @foreach($css_print_array as $var)
            {{ HTML::style($var, array('media' => 'print')) }}
        @endforeach;
        @endif

                <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]>
        <!--<script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="nav nav-pills">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
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
            <div id="navbar" class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">
                   
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <br><br><br>

    @if (Session::has('message'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success bootstrap-admin-alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>¡Alerta!</h4>
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    @endif

    @yield('content')


<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
{{ HTML::script('assets/js/modulos/bootstrap/js/bootstrap.min.js') }}




</body>
</html>
