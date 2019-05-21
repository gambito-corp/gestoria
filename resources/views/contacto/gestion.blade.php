@extends('layouts.app')

<style>
    .modalDialog {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.4);
        z-index: 10;
        opacity:0;
        overflow: scroll;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }
    .modalDialog:target {
        opacity:1;
        pointer-events: auto;
    }
    .modalDialog > .divmodal {
        width: 50%;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #f2f2f2;
        background: -moz-linear-gradient(#fff, #fff);
        background: -webkit-linear-gradient(#fff, #fff);
        background: -o-linear-gradient(#fff, #fff);
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
    }
    .close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
    }
    .close:hover { background: #00d9ff; }
    .hidden{
        display: none;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@section('content')
<div class="container">
    <div class="justify-content-center">
        <h1 class="text-capitalize">Administrar Contactos Web</h1>
    </div>
</div>

<br>

<div class="container">
    @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <br>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Quien lo Envio</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Area</th>
                <th>Mensaje</th>
                <th>Respuesta</th>
                <th>Volver a llamar</th>
                <th colspan="2">ACCIONES</th>
                <th class="hidden">Contenido Largo</th>

            </tr>
        </thead>
        <tbody>
            @foreach($contactos as $contacto)
            <tr>
                <td>{{$contacto->id}}</td>
                <td>{{$contacto->nombre. ' '.$contacto->apellido}}</td>
                <td>{{$contacto->correo}}</td>
                <td>{{$contacto->telefono}}</td>
                <td>{{$contacto->asunto}}</td>
                <td>
                    <?= $contacto->descripcionA = substr($contacto->mensaje, 0, 30) ?>
                    <br>
                    <a href="#openModal_{{$contacto->id}}">
                        ...ver mas
                    </a>
                    <!-- Ventana Modal -->
                    <div id="openModal_{{$contacto->id}}" class="modalDialog">
                        <div class="divmodal">
                            <a href="#close" title="Close" class="close">X</a>
                            <h2>Mensaje completo de  {{$contacto->nombre.' '.$contacto->apellido}}</h2>
                            <hr>
                            <p><?= $contacto->mensaje ?></p>
                        </div>
                    </div>
                    <!-- fin de ventana modal-->
                </td>
                <td>{{$contacto->solucion}}</td>
                <td>{{$contacto->rellamar_en}}</td>

                <td><a class="btn btn-info" href="{{  route('contacto.editar', ['id' =>$contacto->id])}}" target="_self"><span><i class="icon-eye-open"></i> Responder</span></a></td>
                <td>
                    <a class="btn btn-danger" href="#openModalEliminar_{{ $contacto->id }}" target="_self"><span><i class="icon-remove-sign"></i> Eliminar</span></a>
                    <!-- Ventana Modal -->
                    <div id="openModalEliminar_{{ $contacto->id }}" class="modalDialog">
                        <div class="divmodal">
                            <a href="#close" title="Close" class="close">X</a>
                            <center>
                                <h2>Desea eliminar {{ $contacto->nombre.' '.$contacto->apellido }}</h2>
                                <a class='btn btn-danger' href='{{  route('contacto.eliminar', ['id' =>$contacto->id])}} ' target='_self' ><span><i class="icon-location-arrow"  ></i> Eliminar</span></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class='btn btn-success' href='#close' target='_self' ><span><i class="icon-location-arrow"  ></i> no eliminar</span></a>
                            </center>
                        </div>
                    </div>
                    <!-- fin de ventana modal-->

                </td>

                <td class="hidden">
                    vacio
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>

$(document).ready(function() {
    $('#example').DataTable({
        columnDefs: [{
                targets: [0],
                orderData: [0, 1]
            }, {
                targets: [1],
                orderData: [1, 0]
            }, {
                targets: [4],
                orderData: [4, 0]
            }]
    });
});
</script>
@endsection