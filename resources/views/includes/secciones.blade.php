

<div class="grid_12" >
    <div class="gap clearfix custom-h30"> </div>
    <div class="clearfix title-center">
        <h2 class="col-title" >Nuestras areas de trabajo</h2>
    </div>
</div>
<div class="gap clearfix custom-h30" ></div>

<div class="row clearfix" >
    @forelse($secciones as $seccion)
    <div class="grid_4" >
        <div class="services sb1 clearfix" >
            <div class="stitle mb clearfix" >
                <i class="service-icon custom-icon-color{{$seccion->icono}} " ></i>
                <h3>{{$seccion->titulo}}<small>{{$seccion->descripcionC}}</small></h3>
            </div>
        </div>
    </div>
    @empty
    <h2>No Funciona</h2>
    @endforelse

    <div class="row clearfix center">

        <div class="grid_12" >
            <div class="gap clearfix custom-h30" ></div>
            <a class="tbutton medium tbutton5 color1" href="{{route('secciones.index')}}" target="_self" >
                <span><i class="icon-sitemap" ></i>ver todas las secciones</span></a>
        </div>

        <div class="gap clearfix custom-h30" ></div>

    </div>

</div>

