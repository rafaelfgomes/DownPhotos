 <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="#"></a>
                </div>

                <div class="navi">

                    <ul>

                        <li class="active"><a href="/envio"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Imagens</span></a></li>
                        <li class="active"><a href="/usuario/compras"><i class="fa fa-dollar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Compras</span></a></li>
                        <li class="active"><a href="/usuario/vendas"><i class="fa fa-money" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Vendas</span></a></li>

                        @if ($qt > 0)

                            <li class="row toggle" id="dropdown-detail-1" data-toggle="detail-1"><a href="javascript:void(0)"><i class="glyphicon glyphicon-filter" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Filtros</span></a></li>
                            
                            <div id="detail-1">

                                <hr>

                                  <li><a href="{{ route('Imagem.filtrarImagem', ['Novos']) }}"><span class="hidden-xs hidden-sm">Novos</span></a></li> 
                                  <li><a href="{{ route('Imagem.filtrarImagem', ['Aguardando']) }}"><span class="hidden-xs hidden-sm">Aguardando</span></a></li> 
                                  <li><a href="{{ route('Imagem.filtrarImagem', ['Aprovados']) }}"><span class="hidden-xs hidden-sm">Aprovados</span></a></li> 
                                  <li><a href="{{ route('Imagem.filtrarImagem', ['Reprovados']) }}"><span class="hidden-xs hidden-sm">Reprovados</span></a></li> 
                            </div>

                        @endif

                    </ul>
                </div>
            </div>



<script>
$(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});


</script>

<style>
#detail-1 > li > a{
padding-top:0px;
padding-bottom: 0px;
}

</style>