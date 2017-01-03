@extends('layouts.app')
@section('content')

<div class="section">
    <div class="card-panel purple darken-3 white-text">Tutorial CRUD Laravel 5.2 dengan Materializecss</div>
</div>
<div class="section">

 <form method="GET" action=" {{ url('select') }}"><center><select name="q">

    @foreach($cruds as $crud )
                      <option value="{{ $crud->username_id }}">{{ $crud->user->name }}</option>
                       @endforeach
      </select>
<input type="submit" value="Pilih Kelas"/>
 </form>

<div class="section">
    @foreach($cruds as $data)

    <div class="row">
        <div class="col s12">
            <h5>{{ $data->judul }}</h5>

            <div class="divider"></div>
             <img src="{{ asset('image/'.$data->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;">
   
            <p>{!!substr($data->isi,0,200)!!}...</p>
             @if(Auth::guest())
            <a href="{{ url('read', $data->id) }}" class="btn btn-flat pink accent-3 waves-effect waves-light white-text">Hmm <i class="material-icons right">send</i></a>
            
             @elseif(Auth::user()->jabatan == 'ADMIN')   
            <a href="{{ url('read', $data->id) }}" class="btn btn-flat pink accent-3 waves-effect waves-light white-text">Readmore <i class="material-icons right">send</i></a>
           <a href="{{ url('edit', $data->id) }}" class="btn btn-flat purple darken-4 waves-effect waves-light white-text">Edit <i class="material-icons right">mode_edit</i></a> 
           <a href="{{ url('delete', $data->id) }}" onclick="return confirm('Yakin mau hapus data ini sob?')" class="btn btn-flat red darken-4 waves-effect waves-light white-text">Delete <i class="material-icons right">delete</i></a>
            @else(Auth::user()->jabatan == 'MEMBER')   
            <a href="{{ url('read', $data->id) }}" class="btn btn-flat pink accent-3 waves-effect waves-light white-text">Readmore <i class="material-icons right">send</i></a>
           @endif
            </div>
    </div>
    
    @endforeach

</div>


<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a href="{{ url('add') }}" class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
  </div>
{{ $cruds->render() }}

@endsection