 <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="#"></a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="/moderacao"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Imagens</span></a></li>
                        <li class="active"><a href="/moderador/vendas"><i class="fa fa-money" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Vendas</span></a></li>
                        <li class="row toggle" id="dropdown-detail-1" data-toggle="detail-1"><a href="javascript:void(0)"><i class="glyphicon glyphicon-filter" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Filtros</span></a></li>
                            
                            <div id="detail-1">
                            <hr>
                                  <li><a href="{{ route('Moderador.filtrarImagem', ['Novos']) }}"><span class="hidden-xs hidden-sm">Novos: {{\App\Imagem::getQuantidadeFiltro('nv')}}</span></a></li> 
                                  <li><a href="{{ route('Moderador.filtrarImagem', ['Aguardando']) }}"><span class="hidden-xs hidden-sm">Aguardando: {{\App\Imagem::getQuantidadeFiltro('ag')}}</span></a></li> 
                                  <li><a href="{{ route('Moderador.filtrarImagem', ['Aprovados']) }}"><span class="hidden-xs hidden-sm">Aprovados: {{\App\Imagem::getQuantidadeFiltro('ap')}}</span></a></li> 
                                  <li><a href="{{ route('Moderador.filtrarImagem', ['Reprovados']) }}"><span class="hidden-xs hidden-sm">Reprovados: {{\App\Imagem::getQuantidadeFiltro('re')}}</span></a></li> 
                                
                            </div>
                        <li class="active"><a href="{{ route('Moderador.filtrarImagem', ['Deletadas']) }}"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Lixeira: {{\App\Imagem::getQuantidadeLixeira()}}</span></a></li>
                       
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