@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop

@extends('layouts.app')
@section('content')

<div class="section">
	<div class="card-panel purple darken-3 white-text">Tutorial CRUD Laravel 5.2 dengan Materializecss</div>
</div>

<div class="section">
 {!! Form::open(array('url'=>'store', 'files'=>true)) !!}
         
           <table class = "table table-striped">
               <tr><th>
                 {!! Form::label('judul', 'Judul') !!}</th>
                <td>{!! Form::text('judul', null, array('class' => 'input-file','placeholder'=>'Judul')) !!}</td>
                </tr><tr><th>
                 {!! Form::label('isi', 'Isi') !!}</th>
                <td>{!! Form::text('isi', null, array('class' => 'input-file','placeholder'=>'Isi')) !!}</td>
                </tr>
                <tr><th>
                 {!! Form::label('gambar', 'Gambar') !!}</th>
                <td>{!! Form::file('gambar', null, array('class' => 'validate','placeholder'=>'Gambar')) !!}</td>
                </tr>
               <tr><th>
                 {!! Form::label('NIM', 'NIM') !!}</th>
                <td>{!! Form::select('nim', (['0' => 'Select NIM'] + $mhs), null, array('class' => 'input-file')) !!}</td>
                </tr>
                <tr><th>
                 {!! Form::label('NIM', 'NIM') !!}</th>
                <td>{!! Form::select('nim1', (['0' => 'Select NIM'] + $mhs), null, array('class' => 'input-file')) !!}</td>
                </tr>
                
            
 
             
               
           <tr><td>&nbsp</td>
           <td> {!! Form::submit('SIMPAN', array('class' => 'btn btn-primary')) !!}</td></tr>
            </table> 
        {!! Form::close() !!}
</div>

@endsection

