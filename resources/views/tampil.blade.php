@extends('layouts.index')
@section('content')

<div class="section">
	<div class="card-panel purple darken-3 white-text">Tutorial CRUD Laravel 5.2 dengan Materializecss</div>
</div>

<div class="section">
	
	<div class="row">
		<div class="col s12">
			<h5>{{ $tampilkan->judul }}</h5>
			 <div class="divider"></div>
			
			 <img src="{{ asset('image/'.$tampilkan->gambar)  }}" style="max-height:500px;max-width:500px;margin-top:10px;">
            <div class="divider"></div>
            <p>{{ $tampilkan->isi }}</p>
            <div class="divider"></div>
            <p>Posted by {{ $tampilkan->user->name }}</p>
            <a href="{{ url('print', $tampilkan->id) }}" target="_blank">Print</a>
                
		</div>
	</div>

</div>

@endsection
