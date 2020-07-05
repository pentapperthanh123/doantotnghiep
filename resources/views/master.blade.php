@include('partials/header')

<body>

	@include('partials/sidebar')
	
	<div class="wrapper">
    	<div class="main-panel">

    		@include('partials/navbar')
			@yield('body')

    	</div>
	</div>

</body>

@include('partials/footer')