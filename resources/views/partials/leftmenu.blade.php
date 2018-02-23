
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{url('assets/img/profile_small.jpg')}}" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        ZN
                    </div>
                </li>
                <li>
                    <a href="{{url('')}}">
                        <i class="fa fa-money"></i>
                        <span class="nav-label">Página Inicial</span>
                        <span class="fa arrow"></span>
                    </a>
                </li>
                {{--
                <li>
                    <a href="{{url('')}}">
                        <i class="fa fa-money"></i>
                        <span class="nav-label">Página Inicial</span>
                        <span class="fa arrow"></span>
                    </a>
                    <a href="{{url('grupo_gasto/lista')}}">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">Grupo de gasto</span>
                        <span class="fa arrow"></span>
                    </a>
                    <a href="{{url('meio_pag_rec/lista')}}">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">Meios de Pagamento Recebimento</span>
                        <span class="fa arrow"></span>
                    </a>
                    <a href="{{url('gestao_limites/lista')}}">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">Limites</span>
                        <span class="fa arrow"></span>
                    </a>

                </li>
                --}}
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Tabelas</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{url('grupo_gasto/lista')}}">Grupo de gasto</a></li>
                        <li><a href="{{url('meio_pag_rec/lista')}}">Meios de Pagamento Recebimento</a></li>
                        <li><a href="{{url('gestao_limites/lista')}}">Limites</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>