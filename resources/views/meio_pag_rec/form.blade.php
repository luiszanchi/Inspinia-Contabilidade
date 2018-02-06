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
                            <form id="formMeioPagRec" class="form-horizontal" method="POST" action="{{url($formURL)}}">
                                {{ csrf_field() }}
                                @if(isset($editarMeioPagRec) || isset($excluirMeioPagRec))
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Código</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" 
                                        disabled="" 
                                        
                                                        value="{{$meioPagRec->cd_meio_pag_rec}}"
                                        />
                                        <input id="codMeioPagRec" name="codMeioPagRec" type="hidden"                                
                                                        value="{{$meioPagRec->cd_meio_pag_rec}}"
                                        />
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                @endif
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descrição</label>
                                    <div class="col-sm-10">
                                        <input id="descricao" name="descricao" type="text" class="form-control"
                                        @if(isset($editarMeioPagRec) || isset($excluirMeioPagRec))
                                            @if(isset($excluirMeioPagRec))
                                                disabled="" 
                                            @endif
                                                        value="{{$meioPagRec->ds_meio_pag_rec}}"
                                        @endif
                                        />
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-off set-2">
                                        <a href="{{url('/meio_pag_rec/lista')}}"><input type="button" id="cancelarMeioPagRec" class="btn btn-white" value="Cancelar"/></a>
                                        <input type="button" id="salvarMeioPagRec" class="btn btn-primary" value="Salvar"/>
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
        $('#salvarMeioPagRec').click(function(){
                var descricao = $('#descricao').val();
                if({{(isset($excluirMeioPagRec)?'true':'false')}}){
                    $('#formMeioPagRec').submit();
                }
                else if(descricao != null && descricao != ''){   
                    $('#formMeioPagRec').submit();
                }else{
                    toastr.error('Por favor, digite todos os valores obrigatórios', 'Zanchi');
                }

        })

    </script>

</body>
</html>
