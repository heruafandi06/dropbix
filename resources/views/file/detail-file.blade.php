@extends('template')

@section('content')



	<body>
	  <br>
    <div class="container ">
		<div class ="col col-lg-8 ">
  		<h3>Berikut adalah detail file {{ $file->name }}</h3>
  		<br><br>
  		<form method="post" action="" enctype="multipart/form-data">
        <!-- <input type="hidden" name="id" class="form-control" value = "{{ $file->id }}"> -->
        @csrf
  		  <div class="form-group">
    			<label for="exampleInputEmail1">Nama File</label>
    			<input type="text" name="nama_file" class="form-control" placeholder="Masukkan nama file" value = "{{ $file->name }}">
  		  </div>
  		  <p>Tanggal Perubahan Terakhir: {{ $file->updated_at }} </p>
        <section class="jumbotron text-center">
    			<div class="container">
    				<div class="file-upload-wrapper" data-text="Pilih File Kamu!">
    				  <input name="file" type="file" class="file-upload-field" value="">
    				</div>
    			</div>
  		  </section>
        <a href="{{ URL::asset('file/'.$file->url) }}" target="_blank">
          <button type="button" class="btn btn-success">Download</button>
        </a>
        <button type="submit" name="submit" id="buttonUpload" value="update" class="btn btn-primary">Update</button>
        <button type="submit" name="submit" id="buttonUpload" value="delete" class="btn btn-danger">Delete</button>
  		</form>
		</div>
	  </div>
	  <br>
	  <br>
	  <br>
	  <br>
	</body>
@endsection
