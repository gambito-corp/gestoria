@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{$tag->titulo}}</h2>

                </div>
            </div>
            <a href="javascript:history.back()" class="btn btn-info"> Volver Atrás</a>
        </div>
    </div>
</div>
@endsection