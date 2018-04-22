
@include('layouts.includes.head')




<body>
	@include('layouts.includes.header') 
	@include('layouts.includes.alert')


	
	@yield('content') 

	@include('layouts.includes.scripts')
	
</body>

@include('layouts.includes.contact')
@include('layouts.includes.footer')




</style>