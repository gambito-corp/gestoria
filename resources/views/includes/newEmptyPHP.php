<div class="row clearfix" >
    <div class="grid_12 container" >

        <div class="gap clearfix custom-h90" ></div>

        <div class="clearfix title-center" >
            <h2 class="col-title" >Actualizate en el area legal <br> Mira las ultimas Noticias</h2>
        </div>

        <div class="gap clearfix custom-h25" ></div>

        <div class="owl-carousel nav_off" id="pc-tt1">
            @forelse($blogs as $blog)
            <div class="uowl" >
                <div class="hover-fx zoom grayscale" >
                    @if($blog->imagen)
                    <img src="{{Route('blog.imagen', ['filename'=>$blog->imagen])}}" alt="{{$blog->titulo}}" class="img-thumbnail minimg"/>
                    @else

                    @endif

                    <a class="fLeft cntr" href="{{route('blog.ver',['id'=>$blog->id])}}" title="{{$blog->titulo}}"><span><i class="icon-file-text"></i></span></a>
                </div>
                <div class="detailes" >
                    <h5><a href="{{route('blog.ver',['id'=>$blog->id])}}">{{$blog->titulo}}</a></h5>{{$blog->categorias->titulo}}
                </div>
            </div>
            @empty
            <p>VACIO</p>
            @endforelse


        </div>
    </div>
</div>