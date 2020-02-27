@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                <br>
                <br>
                Jika Ingin Masuk Ke Tabel Hobi Silahkan Klik =>
                <a href="{{route('hobi.index')}}" class="btn btn-primary">HOBI</a><br>
                Jika Ingin Masuk Ke Tabel Dosen Silahkan Klik =>
                <a href="{{route('dosen.index')}}" class="btn btn-warning">DOSEN</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
