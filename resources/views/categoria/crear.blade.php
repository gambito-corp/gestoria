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
                <div class="card-header">Crear Categoria</div>
                <div class="card-body">
                    <form action="{{route('categoria.guardar')}}" method="post" enctype="multipart/form-data">
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
                            <label for="imagen" class="col-md-3 col-form-label text-md-right">{{ __('imagen') }}</label>

                            <div class="col-md-6">
                                <input id="imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen" value=""  autofocus>

                                @if ($errors->has('imagen'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcionC" class="col-md-3 col-form-label text-md-right">{{ __('descripcionC') }}</label>

                            <div class="col-md-6">
                                <input id="descripcionC" type="text" class="form-control{{ $errors->has('descripcionC') ? ' is-invalid' : '' }}" name="descripcionC" value="">

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
                                <textarea type="text" id="descripcionL" name="descripcionL" class="form-control{{ $errors->has('descripcionL') ? ' is-invalid' : '' }}"></textarea>

                                @if ($errors->has('descripcionL'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcionL') }}</strong>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection