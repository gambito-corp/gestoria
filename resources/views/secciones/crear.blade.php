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
                <div class="card-header">Crear Seccion Legal</div>
                <div class="card-body">
                    <form action="{{route('secciones.guardar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="titulo" class="col-md-3 col-form-label text-md-right">{{ __('titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value=""  autofocus>

                                @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagenCentral" class="col-md-3 col-form-label text-md-right">{{ __('imagenCentral') }}</label>

                            <div class="col-md-6">
                                <input id="imagenCentral" type="file" class="form-control{{ $errors->has('imagenCentral') ? ' is-invalid' : '' }}" name="imagenCentral" value="tral }}"  autofocus>

                                @if ($errors->has('imagenCentral'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagenCentral') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcionC" class="col-md-3 col-form-label text-md-right">{{ __('descripcionC') }}</label>

                            <div class="col-md-6">
                                <input id="descripcionC" type="text" class="form-control{{ $errors->has('descripcionC') ? ' is-invalid' : '' }}" name="descripcionC" value="}">

                                @if ($errors->has('descripcionC'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcionC') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcionL" class="col-md-3 col-form-label text-md-right">{{ __('descripcionL') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" id="descripcionL" name="descripcionL" class="form-control{{ $errors->has('descripcionL') ? ' is-invalid' : '' }}">}</textarea>

                                @if ($errors->has('descripcionL'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcionL') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <span><i id="mostrar" class="icon-3x custom-icon "></i></span>
                        </div>
                        <div class="form-group row">

                            <label for="icono" class="col-md-3 col-form-label text-md-right">{{ __('icono') }}</label>

                            <div class="col-md-6">

                                <select name="icono" id="icono" onchange="iconShow(this)" class="input-text form-control">
                                    <option value="" disabled selected></option>
                                    <option value="icon-3x custom-icon icon-book">icon-book</option>
                                    <option value="icon-3x custom-icon icon-certificate">icon-certificate</option>
                                    <option value="icon-3x custom-icon icon-key">icon-key</option>
                                    <option value="icon-3x custom-icon icon-legal">icon-legal</option>
                                    <option value="icon-3x custom-icon icon-briefcase">icon-briefcase</option>
                                    <option value="icon-3x custom-icon icon-group">icon-group</option>
                                    <option value="icon-3x custom-icon icon-info-sign">icon-info-sign</option>
                                    <option value="icon-3x custom-icon icon-fire">icon-fire</option>
                                    <option value="icon-3x custom-icon icon-shopping-cart">icon-shopping-cart</option>
                                    <option value="icon-3x custom-icon icon-asterisk">icon-asterisk</option>
                                    <option value="icon-3x custom-icon icon-money">icon-money</option>
                                    <option value="icon-3x custom-icon icon-glass">icon-glass</option>
                                </select>

                                @if ($errors->has('icono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('icono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="metadesc" class="col-md-3 col-form-label text-md-right">{{ __('metadesc') }}</label>

                            <div class="col-md-6">
                                <input id="metadesc" type="text" class="form-control{{ $errors->has('metadesc') ? ' is-invalid' : '' }}" name="metadesc" value=""  autofocus>

                                @if ($errors->has('metadesc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('metadesc') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="metatitle" class="col-md-3 col-form-label text-md-right">{{ __('metatitle') }}</label>

                            <div class="col-md-6">
                                <input id="metatitle" type="text" class="form-control{{ $errors->has('metatitle') ? ' is-invalid' : '' }}" name="metatitle" value="" >

                                @if ($errors->has('metatitle'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('metatitle') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="metakey" class="col-md-3 col-form-label text-md-right">{{ __('metakey') }}</label>

                            <div class="col-md-6">
                                <input id="metakey" type="text" class="form-control{{ $errors->has('metakey') ? ' is-invalid' : '' }}" name="metakey" value="">

                                @if ($errors->has('metakey'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('metakey') }}</strong>
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
                        <script>
                            function iconShow(x) {
                                document.getElementById('mostrar').setAttribute("class", x.value);
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection