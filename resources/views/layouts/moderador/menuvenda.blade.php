 <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="#"></a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="/moderacao"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Imagens</span></a></li>
                        <li class="active"><a href="/moderador/vendas"><i class="fa fa-money" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Vendas</span></a></li>
                       
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