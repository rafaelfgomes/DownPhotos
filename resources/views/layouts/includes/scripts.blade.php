

<!-- js -->
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"> </script>
<!-- required-js-files-->
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script>
   $(document).ready(function() {
     $("#owl-demo").owlCarousel({
       items : 1,
       lazyLoad : true,
       autoPlay : true,
       navigation : false,
       navigationText :  false,
       pagination : true,
     });
   });
</script>
<!--//required-js-files-->
<script type="text/javascript">
   $(window).load(function() {
   	$("#flexiselDemo1").flexisel({
   		visibleItems: 4,
   		animationSpeed: 1000,
   		autoPlay: true,
   		autoPlaySpeed: 3000,    		
   		pauseOnHover: true,
   		enableResponsiveBreakpoints: true,
   		responsiveBreakpoints: { 
   			portrait: { 
   				changePoint:480,
   				visibleItems: 1
   			}, 
   			landscape: { 
   				changePoint:640,
   				visibleItems:2
   			},
   			tablet: { 
   				changePoint:768,
   				visibleItems: 3
   			}
   		}
   	});
   	
   });
</script>
<script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<!-- //end-smoth-scrolling -->
<!-- for bootstrap working -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
<script>   
   $(document).ready(function() {
   	/*
   		var defaults = {
   		containerID: 'toTop', // fading element id
   		containerHoverID: 'toTopHover', // fading element hover id
   		scrollSpeed: 1200,
   		easingType: 'linear' 
   		};
   	*/
   						
   	$().UItoTop({ easingType: 'easeOutQuart' });
   						
   	});
</script>

<!-- //here ends scrolling icon -->
<script type="text/javascript" src="{{ asset('js/pop.js') }}"></script>


