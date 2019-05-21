@extends('layouts.master')
@section('title')
Contactanos
@endsection
@section('descripcion')
Contactanos y descubre la mejopr calidad de servicio en la gestoria AM
@endsection
@section('key')
contacto, Gestoria legal, abogados, AMGestoria;
@endsection
@section('robots')
index,follow
@endsection
@section('extra_inf')
<div class="breadcrumb-place">

    <div class="row clearfix" >
        <h1 class="page-title">Consultanos</h1>
    </div><!-- row -->

</div><!-- breadcrumb -->
@endsection
@section('contenido')
<div class="row clearfix" >
    @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif


    <div class="grid_12" >

        <div class="clearfix title-left" ><h2 class="col-title" >Mandanos tu Pregunta</h2></div>

        <div class="ttcf7">

            <form name="contacto" id="contacto" action="{{route('contacto.guardar')}}" method="post" class="ttcf7-form">
                @csrf
                <p>Nombre* <br />
                    <span class="ttcf7-form-control-wrap your-name">
                        <input type="text" name="nombre" id="nombre" value="" size="40" class="ttcf7-form-control ttcf7-text {{ $errors->has('nombre') ? ' is-invalid' : '' }}"  required/>
                    </span>
                </p>

                <p>Apellido<br />
                    <span class="ttcf7-form-control-wrap your-name">
                        <input type="text" name="apellido" id="apellido" value="" size="40" class="ttcf7-form-control ttcf7-text {{ $errors->has('apellido') ? ' is-invalid' : '' }}" />
                    </span>
                    @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                    @endif
                </p>

                <p>Correo*<br />
                    <span class="ttcf7-form-control-wrap your-email">
                        <input type="email" name="email" id="email"value="" size="40" class="ttcf7-form-control ttcf7-text ttcf7-email {{ $errors->has('email') ? ' is-invalid' : '' }}"  required/>
                    </span>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </p>

                <p>Telefono* <br />
                    <span class="ttcf7-form-control-wrap your-name">
                        <input type="tel" name="telefono" id="telefono" value="" size="40" class="ttcf7-form-control ttcf7-text {{ $errors->has('telefono') ? ' is-invalid' : '' }}"  required/>
                    </span>
                    @if ($errors->has('telefono'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                    @endif
                </p>


                <p>Asunto<br />
                    <span class="ttcf7-form-control-wrap menu-59">
                        <select name="asunto" id="asunto" class="ttcf7-form-control ttcf7-select {{ $errors->has('asunto') ? ' is-invalid' : '' }}">
                            <option value="-" selected disabled required>Elige el motivo de tu contacto</option>
                            <option value="CV">presentar Curriculum</option>
                            <option value="Nuevo Cliente">Soy cliente</option>
                            @forelse($secciones as $seccion)
                            <option value="informacion sobre {{$seccion->titulo}}">informacion sobre {{$seccion->titulo}}</option>
                            @empty
                            <option value="-">CARGA LAS AREAS LEGALES</option>
                            @endforelse
                            <option value="Contacto Urgente">Contactarme con un abogado</option>
                            <option value="Carta de Presentacion">Presentar mis servcicios profesionales</option>
                            <option value="Mensaje Web">Otros (Describir bien el mensaje)</option>
                        </select>
                    </span>
                    @if ($errors->has('asunto'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('asunto') }}</strong>
                    </span>
                    @endif
                </p>


                <p>Tu Pregunta<br />
                    <span class="ttcf7-form-control-wrap your-q">
                        <textarea name="consulta" id="consulta" cols="40" rows="10" class="ttcf7-form-control ttcf7-textarea {{ $errors->has('consulta') ? ' is-invalid' : '' }}" required></textarea>
                    </span>
                    @if ($errors->has('consulta'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('consulta') }}</strong>
                    </span>
                    @endif
                </p>


                <p>
                    <input type="submit" value="Consultanos YA!" class="ttcf7-form-control ttcf7-submit" />
                </p>

            </form>

        </div>

        <div class="gap clearfix custom-h40"> </div>

    </div>

</div>

@endsection