@extends('layouts.master')
@section('title')
{{$miBlog->metatitle}}
@endsection
@section('descripcion')
{{$miBlog->metadesc}}
@endsection
@section('key')
{{$miBlog->metakey}}
@endsection
@section('robots')
index,follow
@endsection
@section('extra_inf')
<div class="breadcrumb-place ">
    <div class="row clearfix" >
        <h1 class="page-title">{{$miBlog->titulo}}</h1>
    </div><!-- row -->
</div><!-- breadcrumb -->
@endsection
@section('contenido')
<div class="row clearfix" >

    <div class="grid_12 posts">

        <div class="post type-post format-standard has-post-thumbnail hentry clearfix" >
            <a href="#" class="thumb-big" >
                @if($miBlog->imagen)

                <img src="{{Route('blog.imagen', ['filename'=>$miBlog->imagen])}}" alt="{{$miBlog->titulo}}" class="img-thumbnail minimg"/>
                @else
                <p>VACIO</p>
                @endif
            </a>

            <div class="meta-box">
                <h3><a href="#">{{$miBlog->titulo}}</a></h3>
                <div class="meta-more">
                    <span><i class="icon-user"></i> <a href="#autor" title="Posts by {{$miBlog->user->role}}" >{{$miBlog->user->role}}</a></span>
                    <span><i class="icon-time"></i><a href="#">{{ \utils::HaceCuanto($miBlog->created_at) }}</a></span>
                    <span><i class="icon-comments"></i> <a href="#comentarios" title="comentarios del post">Hay {{count($comentarios)}} Comentarios</a></span>
                    <span><i class="icon-link"></i> en <a href="{{route('categoria.individual', [$miBlog->categoria_id])}}" >{{$miBlog->categorias->titulo}}</a></span>
                </div><!-- meta date -->
                <br>
                <h6><a href="#">{{$miBlog->subtitulo}}</a></h6>
            </div>

            <p><?= $miBlog->contenido ?></p>

        </div><!-- post -->
        <br>
        @auth
        <div class="likes">

            Comprobar like de usuario
            {{ $user_like = false }}
            @forelse($miBlog->likes as $like)
            @if($like->user->id == Auth::user()->id)
            {{ $user_like = true }}
            @endif
            @empty
            @endforelse
            @if($user_like)
            <img src="{{asset('img/dislike.png')}}" class="btn-dislike" alt="">
            @else
            <img src="{{asset('img/like.png')}}" class="btn-like" alt="">
            @endif
            <p style="font-size: 18px; color: gray;">si te gusto el post dale like:&nbsp; <span style="font-size: 25px;">{{ count($miBlog->likes) }}&nbsp;&nbsp;</span></h2>
        </div>

        @endauth
        <div class="post-tags tags mtt mbf"><span class="etiqueta">Tag: </span>
            <a href="" rel="tag">{{$miBlog->tags->titulo}}</a>

        </div>

        <br>
        <br>
        <br>
        <div class="author-box" id="autor">
            @auth
            <img alt="{{$miBlog->user->name. ' '.$miBlog->user->name2.' '.$miBlog->user->surname. ' '.$miBlog->user->surname2 }}" src='{{Route('user.imagen', ['filename'=>$miBlog->user->imagen])}}' class='fll image-author-big  photo' />
            @endauth
            @guest
            <img src="{{asset('img/usuarios/user.png')}}" alt="{{$miBlog->titulo}}" class="img-thumbnail minimg"/>
            @endguest

            <div class="author-details">
                <h3> {{$miBlog->user->role}} <small> - {{$miBlog->user->name. ' '.$miBlog->user->name2.' '.$miBlog->user->surname. ' '.$miBlog->user->surname2 }}</small></h3>
            </div>
        </div><!-- author -->



        <div class="comments">
            @auth

            @if(Auth::user())
            <!-- formulario de comentarios -->
            <div class="clearfix mbs title-left">

                <div class="clearfix" >
                    <h3 class="col-title" >DEJA TU COMENTARIO</h3>
                </div>

                <div id="respond" class="comment-respond">

                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form action="{{route('comentario.guardar')}}" method="post" id="commentform" class="comment-form">
                        @csrf
                        <input type="hidden" name='blog_id' value="{{$miBlog->id}}">

                        <textarea class="inputer {{$errors->has('comentario') ? 'is-invalid' : ''}}" id="comment" name="comentario" rows="8" placeholder="Tu Opinion *"></textarea>
                        @if ($errors->has('comentario'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comentario') }}</strong>
                        </span>
                        @endif
                        <p class="form-allowed-tags">
                            You may use these
                            <abbr title="HyperText Markup Language">
                                HTML
                            </abbr> tags and attributes:
                            <code>
                                &lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt;
                            </code>
                        </p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" value="Comenta !!" />
                        </p>
                    </form>
                </div><!-- #respond -->

            </div><!-- form -->


            @endauth
            <div id="comentarios">
                <!-- Comentario -->
                <div class="user-comments mbs">

                    <div class="clearfix" >
                        <h3 class="col-title" > Comentarios <span>{{count($comentarios)}}</span></h3>
                    </div>

                    <ul class="comment-list clearfix">
                        @forelse($comentarios as $com)
                        <li class="comment byuser comment-author-admin bypostauthoreven thread-even depth-1 parent" >

                            <div  class="comment-body">

                                <div class="comment-author vcard">
                                    @auth
                                    <img alt="{{$com->user->nick}}" src="{{Route('user.imagen', ['filename'=>$com->user->imagen])}}" class="image-author  photo" />
                                    @endauth
                                    @guest
                                    <img src="{{asset('img/usuarios/user.png')}}" alt="{{$miBlog->titulo}}" class="img-thumbnail minimg"/>
                                    @endguest
                                    <cite class="fn">{{$com->user->nick}}</cite> <span class="says">Dice:</span>
                                </div>

                                <div class="comment-meta commentmetadata"><a href="#">
                                        {{ \utils::HaceCuanto($com->created_at) }}</a>
                                </div>
                                <p>{{$com->contenido}}</p>
                            </div>
                            @if(Auth::check() && ($com->user_id == Auth::user()->id || $com->blog->user_id == Auth::user()->id || Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin'))
                            <br>
                            <div class="grid_4" >
                                <a class='tbutton medium tbutton3 color5' href='{{route('comentario.eliminar', ['id' => $com->id])}}' target='_self' ><span><i class="icon-location-arrow"  ></i> eliminar comentario</span></a>
                            </div>
                            @endif

                        </li><!-- #comment-## -->
                        @empty

                        @endforelse
                    </ul>

                </div><!-- user comments -->
            </div>

        </div><!-- comment -->

    </div><!-- grid 8 posts -->





</div><!-- row -->
@endsection