

<div class="row clearfix mbs" >

    <div class="grid_12 alpha omega portfolio2" >

        <ul class="portfolio clearfix">
            @forelse($secciones as $seccion)
            <li class = "grid_6 alpha">
                <div class = "hover-fx zoom grayscale">
                    <img src="{{Route('secciones.imagen', ['filename'=>$seccion->imagenCentral])}}" alt="" class="img-thumbnail minimg"/>
                    <a class = "fLeft cntr" href = "{{route('secciones.revisar', ['id'=>$seccion->id])}}" title = "{{$seccion->titulo }}"><span><i class = "{{$seccion->icono}}"></i></span></a>
                </div>
                <div class = "detailes" >
                    <h5><a href = "{{route('secciones.revisar', ['id'=>$seccion->id])}}">{{$seccion->titulo}}</a></h5>
                    <p>{{ \utils::HaceCuanto($seccion->created_at) }}
                    </p>
                    <p><?= $seccion->descripcionA = substr($seccion->descripcionL, 0, 255) ?> <br>
                        <a href="{{route('secciones.revisar', ['id'=>$seccion->id])}}" >...ver mas</a></p>
                </div>
            </li>
            @empty
            <p>CARGA LAS SECCIONES LEGALES </p>
            @endforelse

        </ul> <!-- end of .portfolio UL -->
        <div class="clearfix"></div>


    </div>

</div><!-- row -->