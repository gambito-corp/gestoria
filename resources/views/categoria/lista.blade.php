@extends('layouts.master')
@section('title')
{{$listado->metatitle}}
@endsection
@section('descripcion')
{{$listado->metadesc}}
@endsection
@section('key')
{{$listado->metakey}}
@endsection
@section('robots')
index,follow
@endsection
@section('extra_inf')
<div class="breadcrumb-place ">
    <div class="row clearfix" >
        <h1 class="page-title">Listado de post de la categoria {{$listado->titulo}}</h1>
    </div><!-- row -->
</div><!-- breadcrumb -->
@endsection
@section('contenido')
<div class="row clearfix" >

    <div class="grid_8 posts">


        @forelse($blogs as $blog)<!-- Posteriormente cambio en controller por blog-->
        @if($blog->categoria_id == $listado->id)
        <div class="post type-post format-standard has-post-thumbnail hentry clearfix" >
            <a href="{{route('blog.ver', ['id'=>$blog->id])}}" class="thumb-big" >
                @if($blog->imagen)

                <img src="{{Route('blog.imagen', ['filename'=>$blog->imagen])}}" alt="{{$blog->titulo}}" class="img-thumbnail minimg"/>
                @else
                <p>VACIO</p>
                @endif
            </a>

            <div class="meta-box">
                <h3><a href="{{route('blog.ver', ['id'=>$blog->id])}}">{{$blog->titulo}}</a></h3>

                <div class="meta-more">
                    <span><i class="icon-user"></i> <a href="#" title="Post creado por  {{$blog->user->name . ' ' . $blog->user->name2 . ' ' .$blog->user->surname . ' ' . $blog->user->surname2 }}" rel="author">{{$blog->user->role}}</a></span>
                    <span><i class="icon-time"></i><a href="#">{{ \utils::HaceCuanto($blog->created_at) }}</a></span>
                    <span><i class="icon-comments"></i> <a href="#" title="Comment">No Comment</a></span>
                    <span><i class="icon-link"></i> in <a href="#" >{{$listado->titulo}}</a></span>
                </div><!-- meta date -->

            </div>

            <p><?= $blog->contenidoA = substr($blog->contenido, 0, 300) ?></p>
            <a href="{{route('blog.ver',['id'=>$blog->id])}}" class="tbutton tbutton1 small"><span>Leer Mas ›</span></a>

        </div><!-- post -->
        @endif
        @empty
        <div> <h2>carga los blogs</h2>> </div>
        @endforelse







    </div><!-- grid 8 posts -->




</div><!-- row -->
@endsection
