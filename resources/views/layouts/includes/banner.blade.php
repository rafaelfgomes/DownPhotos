<!-- banner -->

	<div class="banner">

		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">

            <!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First-Slide -->
                <div class="item active">
                    <img src="/galeria/preview/{{$carousel->get(0)->id}}/{{0}}" alt="" class="img-responsive" />
                </div>
                
              
                <div class="item">
                    <img src="/galeria/preview/{{$carousel->get(1)->id}}/{{0}}" alt="" class="img-responsive" />
                   
                </div>
             
                 <div class="item">
                    <img src="/galeria/preview/{{$carousel->get(2)->id}}/{{0}}" alt="" class="img-responsive" />
                    
                </div>

            </div>
			
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
			
        </div>

	</div>



<!-- //banner -->