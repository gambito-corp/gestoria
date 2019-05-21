@extends('layouts.app')
<style>
    #mceu_31, #mceu_30{
        display:none;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Contacto de  {{$contacto->nombre. ' '.$contacto->apellido}}</div>
                <div class="card-body">
                    <form action="{{route('contacto.actualizar')}}" method="post">
                        @csrf
                        <input type="hidden" name='id' value="{{$contacto->id}}">
                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $contacto->nombre }}"  autofocus>

                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-3 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ $contacto->apellido }}"  autofocus>

                                @if ($errors->has('apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" name="email" value="{{ $contacto->correo }}">

                                @if ($errors->has('correo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('correo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="area" class="col-md-3 col-form-label text-md-right">{{ __('area') }}</label>

                            <div class="col-md-6">

                                <select name="area" id="area" class="input-text form-control">
                                    <option value="{{$contacto->asunto}}"selected>{{$contacto->asunto}}</option>
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

                                @if ($errors->has('area'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('area') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-3 col-form-label text-md-right">{{ __('telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ $contacto->telefono }}"  autofocus>

                                @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mensaje" class="col-md-3 col-form-label text-md-right">{{ __('mensaje') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" id="mensaje" name="mensaje" class="form-control{{ $errors->has('mensaje') ? ' is-invalid' : '' }}">{{ $contacto->mensaje }}</textarea>

                                @if ($errors->has('mensaje'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mensaje') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group row">
                            <label for="solucion" class="col-md-3 col-form-label text-md-right">{{ __('solucion') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" id="solucion" name="solucion" class="form-control{{ $errors->has('solucion') ? ' is-invalid' : '' }}">{{ $contacto->solucion }}</textarea>

                                @if ($errors->has('solucion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('solucion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection