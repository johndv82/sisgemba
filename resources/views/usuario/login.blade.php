<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Page-->
    <title>Login</title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Fontfaces CSS-->
    <link href="{{asset('fonts/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('fonts/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('fonts/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!--Bootstrap css Asset  -->
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">

    <!-- Vendor CSS-->
    <link href="{{asset('css/vendor/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS Asset-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('img/gemba_logo.jpeg')}}" alt="Gemba"/>
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" name="frmLogin" id="frmLogin">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Usuario</label>
                                    <input class="au-input au-input--full" type="text" name="name" id="name" placeholder="Nombre de Usuario" value="{{old('name')}}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="password" id="password" placeholder="Contraseña">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Mantener Sesión Abierta
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Iniciar Sesión</button>
                            </form>
                        </div>
                        <div>
                            @if(Session('error'))
                                <span class="badge badge-danger">{{Session('error')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap js, Popper and Jquery Asset -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <script type="text/javascript">
        //Validate Form
        if ($("#frmLogin").length > 0) {
            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
            });

            $('#frmLogin').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 25,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        maxlength: 18,
                        minlength: 6
                    }
                },
                messages: {
                    name: {
                        required: "Ingrese un Nombre de Usuario",
                        maxlength: "Nombre muy largo",
                        minlength: "Nombre muy corto"
                    },
                    password: {
                        required: "Ingrese una Contraseña de Usuario",
                        maxlength: "Contraseña muy larga",
                        minlength: "Contraseña muy corta"
                    }
                },
                errorPlacement: function(label, element) {
                    label.addClass('badge badge-light');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }
    </script>

</body>

</html>
<!-- end document-->
