<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{url('/')}}">
            <img src="{{asset('img/gemba_logo.jpeg')}}" alt="GEMBA"/>
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
                        <i class="fas fa-user-secret"></i>Trabajadores</a>
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
                @if(Auth::User()->rol_id == 1)
                    <li>
                        <a href="{{url('usuario')}}">
                            <i class="fas fa-user-circle"></i>Usuarios</a>
                    </li>

                    <!-- Mantenimiento -->
                    <li class="has-sub">
                        <a class="js-arrow" href="#"><i class="fas fa-gears"></i>Mantenimiento</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{url('estadocivil')}}"><i class="fas fa-gear"></i>Estado Civil</a>
                            </li>
                            <li>
                                <a href="{{url('nivelestudios')}}"><i class="fas fa-gear"></i>Nivel de Estudios</a>
                            </li>
                            <li>
                                <a href="{{url('tipodocumento')}}"><i class="fas fa-gear"></i>Tipo de Documento</a>
                            </li>
                            <li>
                                <a href="{{url('cargolaboral')}}"><i class="fas fa-gear"></i>Cargo Laboral</a>
                            </li>
                            <li>
                                <a href="{{url('vinculolaboral')}}"><i class="fas fa-gear"></i>Vínculo Laboral</a>
                            </li>
                            <li>
                                <a href="{{url('regimenpension')}}"><i class="fas fa-gear"></i>Régimen de Pensión</a>
                            </li>
                            <li>
                                <a href="{{url('regimensalud')}}"><i class="fas fa-gear"></i>Régimen de Salud</a>
                            </li>
                            <li>
                                <a href="{{url('periodicidadremuneracion')}}"><i class="fas fa-gear"></i>Periodicidad de Remuneración</a>
                            </li>
                            <li>
                                <a href="{{url('tipocontrato')}}"><i class="fas fa-gear"></i>Tipo de Contrato</a>
                            </li>
                            <li>
                                <a href="{{url('tipotrabajadorasig')}}"><i class="fas fa-gear"></i>Tipo de Trabajador Asignado</a>
                            </li>
                            <li>
                                <a href="{{url('banco')}}"><i class="fas fa-bank"></i>Banco</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Ubigeo -->
                    <li class="has-sub">
                        <a class="js-arrow" href="#"><i class="fas fa-qrcode"></i>Ubigeo</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{url('pais')}}"><i class="fas fa-map"></i>Paises</a>
                            </li>
                            <li>
                                <a href="{{url('departamento')}}"><i class="fas fa-map"></i>Departamentos</a>
                            </li>
                            <li>
                                <a href="{{url('provincia')}}"><i class="fas fa-map"></i>Provincias</a>
                            </li>
                            <li>
                                <a href="{{url('distrito')}}"><i class="fas fa-map"></i>Distritos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-file-excel"></i>Reportes</a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
