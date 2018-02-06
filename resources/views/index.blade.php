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
    </style>
    <div id="wrapper">
        @include('partials.leftmenu')

        <div id="page-wrapper" class="gray-bg">
        @include('partials.topmenu')


        <div class="wrapper wrapper-content">
            <!-- inicio conteudo -->

            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Anotação de Gastos</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="gastoRapido" method="POST">
                            <div class="row">
                                <div class="form-group">
                                    <label class="tipo-gasto-desc">Tipo:</label>                                        
                                    <select id="tipoGasto" class="tipo-gasto-opcoes form-control" name="account">
                                        <option>Selecione</option>
                                        @foreach($tipoGastoLista as $tipoGasto)
                                            <option value="{{$tipoGasto->cd_tipo_gasto}}">{{$tipoGasto->ds_tipo_gasto}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row form-group center-block">
                                        <label>Natureza: </label>
                                        <label> 
                                        <input type="radio" value="ganhou" id="radioGanhou" name="naturezaOperacao">
                                        +
                                        </label>
                                    <label>
                                        <input type="radio" value="gastou" id="radioGastou" name="naturezaOperacao">
                                        -
                                    </label>
                                    
                            </div>
                            <div class="row form-group">
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
                                        <input id="descricaoGasto" type="text" class="gasto-desc-valor form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="gravar pull-right">
                                    <input id="gravarGasto" class="btn btn-primary" type="button" value="Registrar" />
                                </div>
                            </div>
                        </form>
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

        $('#gravarGasto').click(function(){
            var tipoGasto = $('#tipoGasto').val();
            var opcaoNatureza = $('input[name=naturezaOperacao]:checked', '#gastoRapido').val();
            var valorGasto = $('#valorGasto').val();
            var descricaoGasto = $('#descricaoGasto').val();
            console.log(tipoGasto+' - '+opcaoNatureza+' - '+isNaN(parseFloat(valorGasto))+' - '+parseFloat(valorGasto).toFixed(2)+' - '+descricaoGasto)
            if(tipoGasto == null || opcaoNatureza == null  || isNaN(parseFloat(valorGasto)) || parseFloat(valorGasto).toFixed(2) <= 0|| parseFloat(valorGasto).toFixed(2) == NaN || descricaoGasto == null){
                toastr.error('Por favor, digite todos os valores obrigatórios', 'Zanchi');
            }else{
                $.post("demo_test_post.asp",
                {
                    name: "Donald Duck",
                    city: "Duckburg"
                },
                function(data,status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
            }

        });

         $(document).ready(function() {

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
