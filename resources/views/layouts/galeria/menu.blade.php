<link href="{{ asset('css/menu.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/menuEffect.js') }}"></script>
<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
   <div class="logo">
      <a hef="#"></a>
   </div>
   <div class="navi">
      <ul>
         <li class="active"><a href="/galeria"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Galeria</span></a></li>
         <li class="row toggle" id="dropdown-detail-1" data-toggle="detail-1"><a href="javascript:void(0)"><i class="glyphicon glyphicon-filter" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Período</span></a></li>
         <div id="detail-1">
            
            @foreach ($archives as $meses) 
                              
            <li><a href="galeria/?mes={{ $meses['mes'] }}&ano={{ $meses['ano'] }}"><span class="hidden-xs hidden-sm">{{$meses['mes'] . ' ' . $meses['ano']}}</span></a></li>
                                                                     
           @endforeach

        </div>
        <hr>
        <li class="row toggle" id="dropdown-detail-2" data-toggle="detail-2"><a href="javascript:void(0)"><i class="glyphicon glyphicon-filter" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Categorias</span></a></li>
          <div id="detail-2">
           <hr>
           
             @foreach ($categorias as $categoria) 
                              
            <li><a href="galeria/?categoria={{ $categoria['categoria'] }}"><span class="hidden-xs hidden-sm">{{$categoria['categoria']}}</span></a></li>
                                                                     
           @endforeach
         </div>


         
      </ul>
   </div>
</div>
<style>
#detail-1 > li > a > span{
text-transform: uppercase;

}
#navigation{
   z-index:99;
}
</style>