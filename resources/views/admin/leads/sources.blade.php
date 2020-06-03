@extends('layouts.app')

@section('content')
<div class="container">


	@include('nav._crumbs', compact('breadcrumbs'))


    <div class="row justify-content-center">
        <div class="col-6 col-sm-4">
            
        	<div class="list-group list-group-flush ">

	        	@foreach($sources as $source)

	            	<a href="#" class="list-group-item list-group-item-action">{{ $source->name }}</a>

	            @endforeach

	        </div>
            
        </div>


        <div class="col-6 col-sm-8">


        </div>
    </div>


    


</div>


<script>

	

</script>
@endsection