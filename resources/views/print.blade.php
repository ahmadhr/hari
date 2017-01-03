
			<h5>{{ $cetak->judul }}</h5><br>
			 
			
			 <img src="{{ asset('image/'.$cetak->gambar)  }}" style="max-height:500px;max-width:500px;margin-top:10px;"><br><br>
            
            <p>{{ $cetak->isi }}</p>
            <br><br>
            <p>Posted by <b>{{ $cetak->user->name }}</b></p>
            <script type="text/javascript">window.print();</script>
 