@include('partials.head')
<body>
    <style type="text/css">
        .center-block {
            margin-left:auto;
            margin-right:auto;
            display:block;
        }
        .tipo-gasto-desc{
            width: 40px;
            margin-left: 10px;
        }
        .tipo-gasto-opcoes{
            width: calc(100% - 70px);
            display: inline;
        }
        .gasto-desc{
            width: 70px;
        }
        .gasto-desc-valor{
            width: calc(100% - 75px);
            display: inline;
        }
        .gravar{
            width: 100px;
            margin-right: 10px;
        }
        #valorGasto{
            z-index: 0;
        }
        @media (max-width: 425px){
        .ibox-content-hidden{
            display: none;
        }
            .cancelar{
                margin-top: 15px;
            }
            .gravar.pull-right{
                width: 100%;
                margin-right: 0px;
            }
            .gravar.pull-right > input{
                width: 100%;
                margin-right: 0px;
            }      
        }
    </style>
    <div id="wrapper">
        @include('partials.leftmenu')

        <div id="page-wrapper" class="gray-bg">
        @include('partials.topmenu')


        <div class="wrapper wrapper-content">
            <!-- inicio conteudo -->

            <div class="col-md-6">
                <div id="iboxGastoRapido" class="ibox">
                    <div class="ibox-title">
                        <h5>Anotação de Gastos</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i name="exibirIbox" class="fa"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibox-content-hidden">
                        <div class="sk-spinner sk-spinner-wave">
                            <div class="sk-rect1"></div>
                            <div class="sk-rect2"></div>
                            <div class="sk-rect3"></div>
                            <div class="sk-rect4"></div>
                            <div class="sk-rect5"></div>
                        </div>
                        <form id="gastoRapido" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group">
                                    <label class="tipo-gasto-desc">Tipo:</label>                                        
                                    <select id="tipoGasto" name="tipoGasto" class="tipo-gasto-opcoes form-control" name="account">
                                        <option>Selecione</option>
                                        @foreach($tipoGastoLista as $tipoGasto)
                                            <option value="{{$tipoGasto->cd_tipo_gasto}}">{{$tipoGasto->ds_tipo_gasto}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row form-group center-block">
                                        <label>Natureza: </label>
                                    <div style="display: inline-block;">
                                        <label> 
                                        <input type="radio" value="+" id="radioGanhou" name="naturezaOperacao">
                                        Ganhou      
                                        </label>
                                        <label>
                                        <input type="radio" value="-" id="radioGastou" name="naturezaOperacao">
                                        Gastou
                                        </label>
                                    </div>
                                    
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="input-group m-b">
                                    <span class="input-group-addon">R$</span>
                                    <input id="valorGasto" type="text" class="form-control"> 
                                </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="gasto-desc">Descrição: </label>
                                        <input id="descricaoGasto" maxlength="300" type="text" class="gasto-desc-valor form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="gravar pull-right">
                                    <input id="gravarGasto" class="btn btn-primary" type="button" value="Registrar" />
                                </div>
                                <div class="gravar pull-right cancelar">
                                    <input id="resetarFormGasto" class="btn btn-primary" type="button" value="Cancelar" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div id="iboxDinheiro" class="ibox">
                    <div class="ibox-title">
                        
                        <h5>Dinheiro</h5>
                        <div class="ibox-tools pull-right">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                        <span class="label label-success pull-right">Total</span>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">R$ {{$totalDinheiro->total}}</h1>
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
                if($(document).width() <= 425){
                    $('i[name="exibirIbox"]').addClass('fa-chevron-down');
                }else{
                    $('i[name="exibirIbox"]').addClass('fa-chevron-up');
                }

        $('#gravarGasto').click(function(){
            

            var tipoGasto = $('#tipoGasto').val();
            var opcaoNatureza = $('input[name=naturezaOperacao]:checked', '#gastoRapido').val();
            var valorGasto = $('#valorGasto').val();
            var descricaoGasto = $('#descricaoGasto').val();
            var laravel = $('input[name=_token]', '#gastoRapido').val();
            console.log(tipoGasto+' - '+opcaoNatureza+' - '+isNaN(parseFloat(valorGasto))+' - '+parseFloat(valorGasto).toFixed(2)+' - '+descricaoGasto)
            if(tipoGasto == null || opcaoNatureza == null  || isNaN(parseFloat(valorGasto)) || parseFloat(valorGasto).toFixed(2) <= 0|| parseFloat(valorGasto).toFixed(2) == NaN || descricaoGasto == null){
                toastr.error('Por favor, digite todos os valores obrigatórios', 'Zanchi');
            }else{
                $('#iboxGastoRapido').children('.ibox-content').toggleClass('sk-loading');

                $.ajax({
                    url: "/registro_rapido/gasto",
                    type: "post",
                    data: {
                        '_token': laravel,
                        'tipoGasto': tipoGasto,
                        'valorGasto': valorGasto ,
                        'opcaoNatureza': opcaoNatureza,
                        'descricaoGasto': descricaoGasto
                    },
                    success: function (response) {
                        // you will get response from your php page (what you echo or print)                 
                        console.log(response);

                        $('#gastoRapido')[0].reset();
                        $('#iboxGastoRapido').children('.ibox-content').toggleClass('sk-loading');
                        toastr.success('Gasto registrado com sucesso!', 'Zanchi');
                    },
                    error: function (response) {
                        // you will get response from your php page (what you echo or print)                 
                        console.log(response.responseText);
                        $('#iboxGastoRapido').children('.ibox-content').toggleClass('sk-loading');
                        toastr.error('Ocorreu um erro ao tentar gravar no banco!', 'Zanchi');

                    }


                });
            }

        });


         $(document).ready(function() {
         $('#resetarFormGasto').click(function(){
            $('#gastoRapido')[0].reset();
        })

    $("#valorGasto").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }

        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) 
            && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();


        }

    });
    $('#valorGasto').on('change',function(){

        var valor = $('#valorGasto').val();
        if(valor < 0){
            valor = valor*(-1);
        }
        $('#valorGasto').val(parseFloat(valor).toFixed(2));
    })
});
    </script>

</body>
</html>
