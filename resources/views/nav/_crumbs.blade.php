
<nav aria-label="breadcrumb">

	<ol class="breadcrumb">

		@foreach($breadcrumbs as $crumb)

			<li class="breadcrumb-item {{ $crumb['active'] }}" aria-current="page">{{ $crumb['name'] }}</li>
			  
		@endforeach

	</ol>

</nav>