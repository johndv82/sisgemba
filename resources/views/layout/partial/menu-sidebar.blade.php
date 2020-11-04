<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{url('/')}}">
            <img src="{{asset('img/gemba_logo.jpeg')}}"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{url('clientes')}}">
                        <i class="fas fa-users"></i>Clientes</a>
                </li>
                <li>
                    <a href="{{url('trabajadores')}}">
                        <i class="fas fa-user-circle"></i>Trabajadores</a>
                </li>
                <li>
                    <a href={{url('hijostrabajador')}}>
                        <i class="fas fa-child"></i>Hijos de Trabajador</a>
                </li>
                <li>
                    <a href="{{url('asignaciontrabajador')}}">
                        <i class="fas fa-arrow-circle-right"></i>Asignación de Trabajadores</a>
                </li>
                <li>
                    <a href="{{url('vacacion')}}">
                        <i class="fas fa-calendar-check"></i>Vacaciones</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-file-excel"></i>Reportes</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
