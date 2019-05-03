@extends('template')
@section('content')
<body>
<br>
<br>
  <div class="container">
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">DropBix</h1>
        @if(Auth::user())
        <p class="lead text-muted">Selamat datang, {{ Auth::user()->name }}</p>
        <p>
          <a href="{{ route('upload') }}" class="btn btn-primary">Upload filemu di sini!</a>
        </p>
        @else
        <p class="lead text-muted">Sebuah website Indonesia yang mirip DropBox</p>
        <p>
          <a href="{{ route('register') }}" class="btn btn-primary">Daftar di sini</a>
          <a href="{{ route('login') }}" class="btn btn-secondary">Sudah punya akun? Login</a>
        </p>
        @endif
      </div>
    </section>
  </div>
</body>
<br>
<br>
<br>
<br>
@endsection
