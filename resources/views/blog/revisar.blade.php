@extends('layouts.master')
@section('contenido')
<?php if (isset($seccion)): ?>
    <div class="row clearfix" >

        <div class="grid_8 posts">

            <div class="post type-post format-standard has-post-thumbnail hentry clearfix" >
                <a href="#" class="thumb-big" >
                    <img src="{{Route('secciones.imagen', ['filename'=>$seccion->imagenCentral])}}" alt="{{$seccion->titulo}}" class="img-thumbnail minimg"/>
                </a>

                <div class="meta-box">
                    <h3><a href="#"><?= $seccion->titulo ?></a></h3>
                </div>

                <p>
                    <?= $seccion->descripcionL ?>
                </p>

            </div><!-- post -->




        </div><!-- grid 8 posts -->
    </div>
<?php else: ?>
    <h2>Esta Seccion Legal No Existe</h2>
    <?php
    sleep(10);
    header('Location: ' . base_url . 'secciones/index');
    ?>
<?php endif; ?>

@endsection

