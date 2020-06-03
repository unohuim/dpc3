
<div id="accordion">


  @if(! Auth::user()->is_init() )
  
    @include('/admin/settings/_welcome')

  @endif



  @include('admin/settings/_company')

  
  
 
</div>