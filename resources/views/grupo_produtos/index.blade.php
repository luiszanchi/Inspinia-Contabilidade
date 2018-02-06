@include('partials.head')
<body>
    <div id="wrapper">
        @include('partials.leftmenu')

        <div id="page-wrapper" class="gray-bg">
        @include('partials.topmenu')


        <div class="wrapper wrapper-content">
            <!-- inicio conteudo -->
<div class="row">
                <div class="col-md-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tipo de Gasto</h5>
                            <div class="ibox-tools">
                                <a href="{{url('grupo_gasto/novo')}}">
                                    <button type="button" class="btn btn-outline btn-link">Novo</button>
                                </a>
                            </div>
                            
                        </div>
                        <div class="ibox-content">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Descrição</th>
                                    <th>Grupo</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tipo_gasto_lista as $tipo_gasto)
                                <tr>
                                    <td>{{ $tipo_gasto->cd_tipo_gasto }}</td>
                                    <td>{{ $tipo_gasto->ds_tipo_gasto }}</td>
                                    <td>{{$tipo_gasto->grupoGasto->ds_grupo_gasto}}
                                    </td>
                                    <td><a href="{{ url('/grupo_gasto/editar?cd_tipo_gasto='.$tipo_gasto->cd_tipo_gasto) }}"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="{{ url('/grupo_gasto/excluir?cd_tipo_gasto='.$tipo_gasto->cd_tipo_gasto) }}"><i class="fa fa-eraser"></i></a></td>

                                    
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Grupo de Gasto</h5>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($grupo_gasto_lista as $grupo_gasto)
                                <tr>
                                    <td>{{ $grupo_gasto->cd_grupo_gasto }}</td>
                                    <td>{{ $grupo_gasto->ds_grupo_gasto }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- final conteudo -->
        </div>


@include('partials.footer')
        </div>


        

        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{url('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>


    <!-- Custom and plugin javascript -->
    <script src="{{url('assets/js/inspinia.js')}}"></script>
    <script src="{{url('assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{url('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

</body>
</html>
