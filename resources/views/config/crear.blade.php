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
                <div class="card-header">Configurar Parametros</div>
                <div class="card-body">
                    <form action="{{route('config.guardar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="semana" class="col-md-3 col-form-label text-md-right">{{ __('Horario entre semana') }}</label>

                            <div class="col-md-6">
                                <input id="semana" type="text" class="form-control{{ $errors->has('semana') ? ' is-invalid' : '' }}" name="semana" value="9:00-20:00"  autofocus>

                                @if ($errors->has('semana'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('semana') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sabado" class="col-md-3 col-form-label text-md-right">{{ __('Horario Sabados') }}</label>

                            <div class="col-md-6">
                                <input id="sabado" type="text" class="form-control{{ $errors->has('sabado') ? ' is-invalid' : '' }}" name="sabado" value="9:00-14:00"  autofocus>

                                @if ($errors->has('sabado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sabado') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="domingo" class="col-md-3 col-form-label text-md-right">{{ __('Horario Domingo y Feriados') }}</label>

                            <div class="col-md-6">
                                <input id="domingo" type="text" class="form-control{{ $errors->has('domingo') ? ' is-invalid' : '' }}" name="domingo" value="CERRADO"  autofocus>

                                @if ($errors->has('domingo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('domingo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facebook" class="col-md-3 col-form-label text-md-right">{{ __('Facebook') }}</label>

                            <div class="col-md-6">
                                <input id="facebook" type="url" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value=""  autofocus>

                                @if ($errors->has('facebook'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="twitter" class="col-md-3 col-form-label text-md-right">{{ __('Twitter') }}</label>

                            <div class="col-md-6">
                                <input id="twitter" type="url" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value=""  autofocus>

                                @if ($errors->has('twitter'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="linkedin" class="col-md-3 col-form-label text-md-right">{{ __('LinkedIn') }}</label>

                            <div class="col-md-6">
                                <input id="linkedin" type="url" class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" value=""  autofocus>

                                @if ($errors->has('linkedin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo1" class="col-md-3 col-form-label text-md-right">{{ __('Email Principal') }}</label>

                            <div class="col-md-6">
                                <input id="correo1" type="email" class="form-control{{ $errors->has('correo1') ? ' is-invalid' : '' }}" name="correo1" value=""  autofocus>

                                @if ($errors->has('correo1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('correo1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo2" class="col-md-3 col-form-label text-md-right">{{ __('Email Secundario') }}</label>

                            <div class="col-md-6">
                                <input id="correo2" type="email" class="form-control{{ $errors->has('correo2') ? ' is-invalid' : '' }}" name="correo2" value=""  autofocus>

                                @if ($errors->has('correo2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('correo2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono1" class="col-md-3 col-form-label text-md-right">{{ __('Telefono Principal') }}</label>

                            <div class="col-md-6">
                                <input id="telefono1" type="tel" class="form-control{{ $errors->has('telefono1') ? ' is-invalid' : '' }}" name="telefono1" value=""  autofocus>

                                @if ($errors->has('telefono1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono2" class="col-md-3 col-form-label text-md-right">{{ __('Telefono Secundario') }}</label>

                            <div class="col-md-6">
                                <input id="telefono2" type="tel" class="form-control{{ $errors->has('telefono2') ? ' is-invalid' : '' }}" name="telefono2" value=""  autofocus>

                                @if ($errors->has('telefono2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-3 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="">

                                @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="marca" class="col-md-3 col-form-label text-md-right">{{ __('Nombre de la Gestoria') }}</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="">

                                @if ($errors->has('marca'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('marca') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Primer Nombre</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value=""  autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="name2" class="col-md-2 col-form-label text-md-right">Segundo Nombre</label>

                            <div class="col-md-4">
                                <input id="name2" type="text" class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" name="name2" value=""  autofocus>

                                @if ($errors->has('name2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Primer Apellido</label>

                            <div class="col-md-4">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value=""  autofocus>

                                @if ($errors->has('surname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="surname2" class="col-md-2 col-form-label text-md-right">Segundo Apellido</label>

                            <div class="col-md-4">
                                <input id="surname2" type="text" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" name="surname2" value=""  autofocus>

                                @if ($errors->has('surname2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surname2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firma" class="col-md-3 col-form-label text-md-right">{{ __('Firma') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" id="firma" name="firma" class="form-control{{ $errors->has('firma') ? ' is-invalid' : '' }}"></textarea>

                                @if ($errors->has('firma'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('firma') }}</strong>
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