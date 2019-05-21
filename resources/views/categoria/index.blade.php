@extends('layouts.master')
@section('title')
Categorias
@endsection
@section('descripcion')
Esta es una paginas de categorias central, mira las noticias de la gestoria A M
@endsection
@section('key')
Blog, Gestoria legal, noticias legales, AMGestoria;
@endsection
@section('robots')
index,follow
@endsection
@section('extra_inf')
<div class="breadcrumb-place ">
    <div class="row clearfix" >
        <h1 class="page-title">Listado de categorias</h1>
    </div><!-- row -->
</div><!-- breadcrumb -->
@endsection
@section('contenido')
<div class="row clearfix" >

    <div class="grid_8 posts">


        @forelse($categorias as $cat)

        <div class="post type-post format-standard has-post-thumbnail hentry clearfix" >
            <a href="{{route('categoria.individual', [$cat->id])}}" class="thumb-big" >
                @if($cat->imagen)
                <img src="{{Route('categoria.imagen', ['filename'=>$cat->imagen])}}" alt="" class="img-thumbnail minimg"/>
                @else
                <p>VACIO</p>
                @endif
            </a>

            <div class="meta-box">
                <h3><a href="single-quote.html">{{$cat->titulo}}</a></h3>

                <div class="meta-more">
                    <span><i class="icon-user"></i> <a href="#" title="Categoria creada por  {{$cat->user->name . ' ' . $cat->user->name2 . ' ' .$cat->user->surname . ' ' . $cat->user->surname2 }}" rel="author">{{$cat->user->role}}</a></span>
                    <span><i class="icon-time"></i><a href="#">{{$cat->created_at}}</a></span>

                </div><!-- meta date -->

            </div>

            <p><?= $cat->descripcionL ?></p>
            <a href="{{route('categoria.individual', [$cat->id])}}" class="tbutton tbutton1 small"><span>ver las Entradas de esta categoria ›</span></a>

        </div><!-- post -->
        @empty
        @endforelse







    </div><!-- grid 8 posts -->




</div><!-- row -->
@endsection
