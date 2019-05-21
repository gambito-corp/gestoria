@extends('layouts.master')
@section('title')
Gestoria Legal
@endsection
@section('descripcion')
Somos A M Gestoria, La mejor gestoria
@endsection
@section('key')
hol,
@endsection
@section('robots')
index,follow
@endsection
@section('contenido')
@include('includes.slide')
<br>
<br>
<br>
@include('includes.secciones')
@include('includes.especialidades')

@include('includes.firma')
@include('includes.call')
@endsection