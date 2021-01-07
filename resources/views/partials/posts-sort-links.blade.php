<h3>{{ $title }}</h3>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb main-theme">
	  @if ($sort == 'new')
		  <li class="breadcrumb-item"><div class="badge badge-light text-wrap">New</div></li>
	  @else 
		  <li class="breadcrumb-item"><a href="{{ route($route, ['sort' => 'new']) }}">New</a></li>
	  @endif
	  @if ($sort == 'best')
		  <li class="breadcrumb-item"><div class="badge badge-light text-wrap">Best</div></li>
	  @else 
		  <li class="breadcrumb-item {{ $sort == 'best'?'active':'' }}"><a href="{{ route($route, ['sort' => 'best']) }}">Best</a></li>
	  @endif
	 
	 <li class="breadcrumb-item active">Hot</li>
  </ol>
</nav>