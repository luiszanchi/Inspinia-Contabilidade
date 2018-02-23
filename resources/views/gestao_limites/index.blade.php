@include('partials.head')
<body>
    <div id="wrapper">
        @include('partials.leftmenu')

        <div id="page-wrapper" class="gray-bg">
        @include('partials.topmenu')


        <div class="wrapper wrapper-content">
            <!-- inicio conteudo -->
           <div class="row">
            <div class="col-md-12">
               <div class="ibox">
                    <div class="ibox-title">
                        <h5>Basic form <small>Gestão de Limites</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            {{--
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                            --}}
                        </div>
                    </div>
                    <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="10" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Tipo de Gasto</th>
                                    <th data-hide="phone,tablet">Tipo de Limite</th>
                                    <th data-hide="phone,tablet">Data Inicial</th>
                                    <th data-hide="phone,tablet">Data Final</th>
                                    <th data-hide="phone,tablet">Valor</th>
                                    <th data-hide="phone,tablet">Dias Úteis</th>
                                    <th data-hide="phone,tablet">Ativo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($gestaoLimitesLista as $gestaoLimites)
                                    <tr class="gradeA">
                                        <td>{{$gestaoLimites->cd_limite}}</td>
                                        <td>{{$gestaoLimites->tipoGasto->ds_tipo_gasto}}</td>
                                        <td>{{$gestaoLimites->descTipoLimite->ds_tp_limite}}</td>
                                        <td>{{$gestaoLimites->dt_limite_ini}}</td>
                                        <td>{{$gestaoLimites->dt_limite_fim}}</td>
                                        <td>{{$gestaoLimites->vl_limite}}</td>
                                        <td>{{$gestaoLimites->descSnUteis->ds_sn}}</td>
                                        <td>{{$gestaoLimites->descSnAtivo->ds_sn}}</td>
                                        {{--<td class="center">4</td><td class="center">X</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
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

    <!-- FooTable -->
    <script src="{{url('assets/js/plugins/footable/footable.all.min.js')}}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>
</html>
