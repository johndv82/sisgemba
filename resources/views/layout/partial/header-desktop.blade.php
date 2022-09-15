<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div class="form-header">
                </div>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{asset('img/user.png')}}" alt=""/>
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth::User()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">

                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{asset('img/user.png')}}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{Auth::User()->name}}</a>
                                        </h5>
                                        <span class="email">{{Auth::User()->email}}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Ajustes</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{route('pagecambiopwdUsuario')}}">
                                            <i class="zmdi zmdi-key"></i>Cambiar Contraseña</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <a href="#" onclick="this.closest('form').submit()">
                                            <i class="zmdi zmdi-power"></i>Cerrar Sesión</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->
