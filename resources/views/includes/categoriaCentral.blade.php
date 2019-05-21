

<div class="row clearfix mbs" >

    <div class="grid_12 alpha omega portfolio2" >

        <ul class="portfolio clearfix">
            @forelse($categorias as $categoria)
            <li class = "grid_6 alpha">
                <div class = "hover-fx zoom grayscale">
                    <img src="{{Route('categoria.imagen', ['filename'=>$categoria->imagen])}}" alt="" class="img-thumbnail minimg"/>
                    <a class = "fLeft cntr" href = "{{route('categoria.revisar', ['id'=>$categoria->id])}}" title = "{{$categoria->titulo }}"> descubreme </a>
                </div>
                <div class = "detailes" >
                    <h5><a href = "{{route('categoria.revisar', ['id'=>$categoria->id])}}">{{$categoria->titulo}}</a></h5>
                    <p>{{ \utils::HaceCuanto($seccion->created_at) }}
                    </p>
                    <p><?= $categoria->descripcionA = substr($categoria->descripcionL, 0, 255) ?> <br>
                        <a href="{{route('categoria.revisar', ['id'=>$categoria->id])}}" >...ver mas</a></p>
                </div>
            </li>
            @empty
            <p>CARGA LAS CATEGORIAS </p>
            @endforelse

        </ul> <!-- end of .portfolio UL -->
        <div class="clearfix"></div>


    </div>

</div><!-- row -->