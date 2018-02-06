@include('partials.head')
<body>
    <div id="wrapper">
        @include('partials.leftmenu')

        <div id="page-wrapper" class="gray-bg">
        @include('partials.topmenu')


        <div class="wrapper wrapper-content">
            <!-- inicio conteudo -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{ $operacao }}</h5>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form id="formTipoGasto" class="form-horizontal" method="POST" action="{{url($formURL)}}">
                                {{ csrf_field() }}
                                @if(isset($editarTipoGasto) || isset($excluirTipoGasto))
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Código</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" 
                                        disabled="" 
                                        
                                                        value="{{$tipoGasto->cd_tipo_gasto}}"
                                        />
                                        <input id="codTipoGasto" name="codTipoGasto" type="hidden"                                
                                                        value="{{$tipoGasto->cd_tipo_gasto}}"
                                        />
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                @endif
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descrição</label>
                                    <div class="col-sm-10">
                                        <input id="descricao" name="descricao" type="text" class="form-control"           
                                        @if(isset($editarTipoGasto) || isset($excluirTipoGasto))
                                            @if(isset($excluirTipoGasto))
                                                disabled="" 
                                            @endif
                                                        value="{{$tipoGasto->ds_tipo_gasto}}"
                                        @endif
                                        />
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Grupo de Produto</label>
                                    <div class="col-sm-10">
                                        @if(!isset($excluirTipoGasto))
                                        <select id="codGrupoGasto" name="codGrupoGasto" class="form-control m-b" name="account">
                                            <option value="">Selecione</option>
                                            @foreach($grupo_gasto_lista as $grupo_gasto)
                                                <option value="{{$grupo_gasto->cd_grupo_gasto}}"
                                                    @if(isset($tipoGasto) && $tipoGasto->cd_grupo_gasto == $grupo_gasto->cd_grupo_gasto)
                                                        selected=""
                                                    @endif
                                                    >{{$grupo_gasto->ds_grupo_gasto}}</option>
                                            @endforeach
                                        </select>
                                        @elseif(isset($excluirTipoGasto))
                                        <input type="text" class="form-control" 
                                        disabled="" value="{{$tipoGasto->grupoGasto->ds_grupo_gasto}}"/>
                                        @endif
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-off set-2">
                                        <a href="{{url('/grupo_gasto/lista')}}"><input type="button" id="cancelarTipoGasto" class="btn btn-white" value="Cancelar"/></a>
                                        <input type="button" id="salvarTipoGasto" class="btn btn-primary" value="Salvar"/>
                                    </div>
                                </div>



                            </form>
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
        <!-- Toastr -->
    <script src="{{url('assets/js/plugins/toastr/toastr.min.js')}}"></script>

    <script type="text/javascript">
        toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
        $('#salvarTipoGasto').click(function(){
                var descricao = $('#descricao').val();
                var codGrupoGasto = $('#codGrupoGasto').find(":selected").val();
                /*console.log('descricao: '+descricao);
                console.log('codGrupoGasto: '+codGrupoGasto);*/
                if({{(isset($excluirTipoGasto)?'true':'false')}}){
                    $('#formTipoGasto').submit();

                }
                else if(descricao != null && descricao != '' && codGrupoGasto != null && codGrupoGasto != ''){   
                    $('#formTipoGasto').submit();
                }else{
                    toastr.error('Por favor, digite todos os valores obrigatórios', 'Zanchi');
                }

        })

    </script>

</body>
</html>
