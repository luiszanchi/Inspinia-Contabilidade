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
                            <h5>Meios de Pagamento e Recebimento</h5>
                            <div class="ibox-tools">
                                <a href="{{url('meio_pag_rec/novo')}}">
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
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($meio_pag_rec_lista as $meio_pag_rec)
                                <tr>
                                    <td>{{ $meio_pag_rec->cd_meio_pag_rec }}</td>
                                    <td>{{ $meio_pag_rec->ds_meio_pag_rec }}</td>
                                    <td><a href="{{ url('/meio_pag_rec/editar?cd_meio_pag_rec='.$meio_pag_rec->cd_meio_pag_rec) }}"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="{{ url('/meio_pag_rec/excluir?cd_meio_pag_rec='.$meio_pag_rec->cd_meio_pag_rec) }}"><i class="fa fa-eraser"></i></a></td>

                                    
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
