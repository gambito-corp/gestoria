@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif

            <div class="card">
                <div class="card-header">Edicion de usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{Route('user.actualizar.maestro')}}" aria-label="Edicion de usuario" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <label for="role" class="col-md-2 col-form-label text-md-right">Rol</label>

                            <div class="col-md-10">
                                <select name="role" id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}">
                                    <option value="{{$user->role}}">{{$user->role}}</option>
                                    <option value="user">Cliente</option>
                                    <option value="editor">Editor</option>
                                    <option value="socio">Socio</option>
                                    <option value="admin">Administrador</option>
                                </select>

                                @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}"  autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="name2" class="col-md-2 col-form-label text-md-right">{{ __('Name2') }}</label>

                            <div class="col-md-4">
                                <input id="name2" type="text" class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" name="name2" value="{{ $user->name2 }}"  autofocus>

                                @if ($errors->has('name2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">{{ __('surname') }}</label>

                            <div class="col-md-4">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{$user->surname }}"  autofocus>

                                @if ($errors->has('surname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="surname2" class="col-md-2 col-form-label text-md-right">{{ __('surname2') }}</label>

                            <div class="col-md-4">
                                <input id="surname2" type="text" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" name="surname2" value="{{ $user->surname2 }}"  autofocus>

                                @if ($errors->has('surname2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surname2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('nick') }}</label>

                            <div class="col-md-4">
                                <input id="nick" type="text" class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ $user->nick }}"  autofocus>

                                @if ($errors->has('nick'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nick') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="telefono" class="col-md-2 col-form-label text-md-right">{{ __('telefono') }}</label>

                            <div class="col-md-4">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ $user->telefono }}"  autofocus>

                                @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" >

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">

                            <label for="imagen" class="col-md-2 col-form-label text-md-right">Imagen</label>

                            <div class="col-md-10">
                                @if($user->imagen)
                                <img src="{{Route('user.imagen', ['filename'=>$user->imagen])}}" alt="" class="img-thumbnail avatar-muestra"/>
                                @endif
                                <input id="Imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen">

                                @if ($errors->has('imagen'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagen') }}</strong>
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
    @endsection