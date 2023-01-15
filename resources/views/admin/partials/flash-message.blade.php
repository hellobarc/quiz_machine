@if ($errors->any())
    <div class="alert alert-danger">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif


@if(Session::has('success'))
	<div>
		<div class="alert alert-success">
			{{ Session::get('success') }}
		</div>
	</div>

@endif


{{-- @if(Session::has('errors'))
    <div->
        <div class="alert alert-danger">
            <p>{{ Session::get('errors') }}</p>
        </div>
    </div->

@endif --}}