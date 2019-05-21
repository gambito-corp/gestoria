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
                <div class="card-header">Editar blog {{$blog->titulo}}</div>
                <div class="card-body">
                    <form action="{{route('blog.actualizar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name='id' value="{{$blog->id}}">

                        <div class="form-group row">
                            <label for="categoria" class="col-md-3 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-6">
                                <select name="categoria" id="categoria" class="input-text form-control">
                                    <option value="{{$blog->categorias->id}}" selected>{{$blog->categorias->titulo}}</option>
                                    @forelse($categorias as $cat)
                                    <option value="{{$cat->id}}">{{$cat->titulo}}</option>
                                    @empty
                                    <option value="">Crea Categorias</option>
                                    @endforelse
                                </select>

                                @if ($errors->has('categoria'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('categoria') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titulo" class="col-md-3 col-form-label text-md-right">{{ __('titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{$blog->titulo}}"  autofocus>

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
                            <div class="col-md-3 offset-md-3">
                                @if($blog->imagen)
                                <img src="{{Route('blog.imagen', ['filename'=>$blog->imagen])}}" alt="" class="img-thumbnail img-edicion" />
                                @else
                                <p>VACIO</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitulo" class="col-md-3 col-form-label text-md-right">{{ __('subtitulo') }}</label>

                            <div class="col-md-6">
                                <input id="subtitulo" type="text" class="form-control{{ $errors->has('subtitulo') ? ' is-invalid' : '' }}" name="subtitulo" value="{{$blog->subtitulo}}">

                                @if ($errors->has('subtitulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subtitulo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contenido" class="col-md-3 col-form-label text-md-right">{{ __('contenido') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" id="contenido" name="contenido" class="form-control{{ $errors->has('contenido') ? ' is-invalid' : '' }}">{{$blog->contenido}}</textarea>

                                @if ($errors->has('contenido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contenido') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tag" class="col-md-3 col-form-label text-md-right">tag</label>

                            <div class="col-md-6">
                                <select name="tag" id="tag" class="input-text form-control">
                                    <option value="{{$blog->tags->id}}" selected>{{$blog->tags->titulo}}</option>
                                    @forelse($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->titulo}}</option>
                                    @empty
                                    <option value="">Crea Tags</option>
                                    @endforelse
                                </select>

                                @if ($errors->has('tag'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tag') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="metadesc" class="col-md-3 col-form-label text-md-right">{{ __('metadesc') }}</label>

                            <div class="col-md-6">
                                <input id="metadesc" type="text" class="form-control{{ $errors->has('metadesc') ? ' is-invalid' : '' }}" name="metadesc" value="{{$blog->metadesc}}"  autofocus>

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
                                <input id="metatitle" type="text" class="form-control{{ $errors->has('metatitle') ? ' is-invalid' : '' }}" name="metatitle" value="{{$blog->metatitle}}" >

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
                                <input id="metakey" type="text" class="form-control{{ $errors->has('metakey') ? ' is-invalid' : '' }}" name="metakey" value="{{$blog->metakey}}">

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
                                    Publicar
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