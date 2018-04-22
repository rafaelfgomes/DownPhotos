<link href="{{ asset('css/flash.css') }}" rel="stylesheet" type="text/css" media="all" />

 @if($flash = session('Mensagem'))

        	<div id="flash" class="alert alert-success" role="alert">
		
               	{{ $flash }}
        	</div>
        
@endif


@if (count($errors))


    <div  id="flash" class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                
                <li>{{ $error }}</li>
            
                @endforeach
                
            </ul>
        
        </div>


    </div>

@endif



<script>
	setTimeout(function() {
	      $('#flash').fadeOut('slow');
	}, 3000);
</script>
