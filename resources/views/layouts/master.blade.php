<?php ?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7" lang="en-US"><![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="en-US"><![endif]-->
<!--[if IE 9 ]><html class="ie9" lang="en-US"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <!-- Basic Page Needs -->
        <meta charset="UTF-8">
        <title>{{$con->marca}} - @yield('title')</title>

        <meta name="description" content="@yield('descripcion')">
        <meta name="description" content="@yield('key')">

        <meta name="robots" content="@yield('robots')" />


        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <!-- Favicons -->
        <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon" />

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic%7CRaleway:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

        <!-- Stylesheets -->
        <link rel='stylesheet' id='stylesheet-css'  href="{{ asset('css/style.css?ver=1.0')}}" type='text/css' media='all' />
        <link rel='stylesheet' id='icons-css'  href="{{ asset('css/icons.css?ver=1.0')}}" type='text/css' media='all' />
        <link rel='stylesheet' id='animate-css'  href="{{ asset('css/animate.css?ver=1.0')}}" type='text/css' media='all' />
        <link rel='stylesheet' id='responsive-css'  href="{{ asset('css/responsive.css?ver=1.0')}}" type='text/css' media='all' />
        <link rel='stylesheet' id='shortcodes-css'  href="{{ asset('css/shortcodes.css?ver=1.0')}}" type='text/css' media='all' />
        <link rel='stylesheet' id='rs-plugin-settings-css'  href="{{ asset('css/settings.css?ver=4.6.5')}}" type='text/css' media='all' />

        <!-- Custom CSS -->
        @yield('boostrap')
        <link rel='stylesheet' id='custom-css'  href="{{asset('css/custom-styles.css')}}" type='text/css' media='all' />
        <link rel="stylesheet" href="{{asset('css/modal.css')}}"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    </head>
    <body class="home tt_responsive">
        @section('header')
        <div id="home" >
            <div id="layout" class="full">

                <header id="header" class="header_v2 header_v9">
                    <div class="headdown" >

                        <div class="row clearfix" >

                            <div class="info" >
                                @Auth
                                <i class="icon-power-off" ></i>                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endAuth
                                @guest
                                <i class="icon-user" ></i>
                                <a href="{{action('HomeController@index')}}">Log-In</a>
                                <i class="icon-user" ></i>
                                <a href="{{ route('register') }}">registro</a>
                                @endguest
                                <i class="icon-envelope-alt" ></i>
                                <a href="mailto:{{$con->correo2}}">{{$con->correo2}}</a>
                                <i class="icon-phone"></i> {{$con->telefono1}}
                            </div><!-- end info -->

                            <div class="social social-head without_border rs" >
                                <a href="{{$con->twitter}}" target="_blank" class="bottomtip" title="Twitter">
                                    <i class="icon-twitter"></i>
                                </a >
                                <a href="{{$con->facebook}}" target="_blank"  class="bottomtip" title="Facebook">
                                    <i class="icon-facebook"></i>
                                </a >
                            </div><!-- end social -->


                            <div class="iconT row-fluid the-icons" >

                            </div>
                            @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin'))
                            <div class="iconT row-fluid the-icons" >
                                <a href="{{ route('config.gestion') }}" target="_blank" class="" title="Configurar">
                                    <i class="icon-wrench"></i>
                                </a >
                            </div>
                            @endif
                        </div><!-- row -->

                    </div><!-- headdown -->
                    <div class="head my_sticky" >

                        <div class="row clearfix" >

                            <div class="logo" >
                                <a href="{{route('index')}}"><img src="{{asset('img/logo.png')}}" alt="{{$con->marca}} - Logo" width="70" /></a>
                            </div><!-- end logo -->

                            <!-- Menu -->

                            <nav class="main">
                                <ul id="menu-main-menu" class="sf-menu">

                                    <li class="menu-item"><a href="{{route('index')}}">inicio</a></li>
                                    <!-- <li class="menu-item"><a href="index/nosotros" >Nosotros</a></li> -->
                                    <li class="menu-item"><a href="{{route('secciones.index')}}">Areas Legales</a>
                                        <ul class="sub-menu">
                                            @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin' || Auth::user()->role == 'socio'))
                                            <li class="menu-item"><a href="{{route('secciones.gestion')}}">Panel de Areas</a></li>
                                            <li class="menu-item"><a href="{{route('secciones.crear')}}">Crear Area Nueva</a></li>
                                            <hr>
                                            @endif
                                            @forelse($secciones as $seccion)
                                            <li class="menu-item"><a href="{{route('secciones.revisar', ['id'=>$seccion->id])}}">{{$seccion->titulo}}</a></li>
                                            @empty
                                            <li>CARGA LAS AREAS LEGALES</li>
                                            @endforelse
                                        </ul>
                                    </li>
                                    <li class="menu-item"><a href="{{route('categoria.lista')}}">Blog</a>
                                        <ul class="sub-menu">
                                            @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin'))
                                            <li class="menu-item"><a href="{{route('comentario.gestion')}}">Gestionar Comentarios</a></li>
                                            @endif
                                            @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin' || Auth::user()->role == 'socio'))
                                            <li class="menu-item"><a href="{{route('categoria.gestion')}}">Gestionar Categorias</a></li>

                                            @endif
                                            @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin' || Auth::user()->role == 'socio' || Auth::user()->role == 'editor'))
                                            <li class="menu-item"><a href="{{route('etiquetas.gestion')}}">Gestionar Etiquetas</a></li>
                                            <li class="menu-item"><a href="{{route('blog.gestion')}}">Gestionar Blogs</a></li>
                                            <li class="menu-item"><a href="{{route('blog.crear')}}">Crear Nuevo Blog</a></li>
                                            @endif
                                            <?php

                                            use App\categoria;
                                            ?>
                                            @forelse($categorias as $categoria)
                                            <li class="menu-item"><a href="{{route('categoria.individual', [$categoria->id])}}">{{$categoria->titulo}}</a>
                                                <ul class="sub-menu">
                                                    @forelse($blogs as $blog)
                                                    @if($blog->categoria_id == $categoria->id)
                                                    <li class="menu-item"><a href="{{route('blog.ver', [$blog->id])}}">{{$blog->titulo}}</a></li>
                                                    @endif
                                                    @empty
                                                    <li>CARGA LOS BLOGS</li>
                                                    @endforelse
                                                </ul>
                                            </li>
                                            @empty
                                            <li>CARGA LAS CATEGORIAS</li>
                                            @endforelse


                                        </ul>
                                    </li>
                                    @if(Auth::user())
                                    <li class="menu-item"><a href="">Area de Socios</a>
                                        <ul class="sub-menu">
                                            @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin'))
                                            <li class="menu-item"><a href="{{route('user.gestion')}}">Panel de Usuarios</a></li>
                                            @endif
                                            <li class="menu-item"><a href="usuario/registro">Mi Perfil</a></li>
                                        </ul>
                                    </li>
                                    @endif



                                    <li class="special menu-item"><a href="{{route('contacto.crear')}}">Contactanos</a></li>
                                    @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'Superadmin'))
                                    <li class="special menu-item"><a href="{{route('contacto.gestion')}}">Registros de web</a></li>
                                    @endif
                                </ul>
                            </nav><!-- /End Menu -->

                        </div><!-- /row -->

                    </div><!-- /head -->
                </header><!-- /end header -->
                @show
                @yield('extra_inf')
                <div class="page-content">
                    @yield('contenido')
                </div><!-- End of Page-Content-->
                @section('footer')
                <footer id="footer">

                    <div id="toTop"><i class="icon-angle-up"></i></div><!-- Back to top -->

                    <div class="row clearfix" >

                        <div class="footer_widget widget_text grid_4" >
                            <h3 class="col-title" >About Us</h3>
                            <div class="textwidget" ><?= $con->firma ?>
                                <div class="footer-sign"><img src="{{asset('img/sign-small.png')}}" alt="firma de {{$con->nombre1.' '.$con->apellido1}}" /></div>
                            </div>
                        </div>

                        <div class="footer_widget widget_text grid_4" >
                            &nbsp;
                        </div>

                        <div class="footer_widget widget_thelaw_contact grid_4" >
                            <h3 class="col-title" >Contactanos</h3>
                            <div class="address" >
                                <p>{{$con->direccion}}</p>
                                <div><i class="icon-phone icon-xs" ></i>{{$con->telefono1}}</div>
                                <div><i class="icon-print icon-xs" ></i>{{$con->telefono2}}</div>
                                <div><a href="mailto:{{$con->correo2}}" target="_blank"><i class="icon-envelope-alt icon-xs" ></i>{{$con->correo2}}</a></div>
                            </div>
                        </div>

                    </div><!-- row -->

                    <div class="footer-last row mtf clearfix" >

                        <span class="copyright" >Copyright © {{date('Y')}} {{$con->marca}}. Desarrollada Por <a href="http://www.gambitocorp.com" target="_blank">Gambito Corp</a>.</span>

                        <div class="menu-footer-menu-container" >
                            <ul id="menu-footer-menu" class="foot-menu" >
                                <li class="menu-item"><a href="about-us.html" >About Us</a></li>
                                <li class="menu-item" ><a href="{{route('categoria.lista')}}" >Blog</a></li>
                                <li class="menu-item" ><a href="{{route('contacto.crear')}}" >Contacto</a></li>
                            </ul>
                        </div>

                    </div><!-- end last footer -->

                </footer><!-- end footer -->
            </div><!-- end layout -->
        </div><!-- end frame -->
        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script type='text/javascript' src="{{asset('js/themetor.js?ver=1.0')}}"></script>
        <script type='text/javascript' src="{{asset('js/custom.js?ver=1.0')}}"></script>
        <script type='text/javascript' src="{{asset('js/owl.carousel.min.js?ver=2.0.0')}}"></script>
        <script type='text/javascript' src="{{asset('js/revslider/jquery.themepunch.revolution.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/revslider/jquery.themepunch.tools.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/jquery.flexslider-min.js?ver=2.1')}}"></script>

        <script>

/******************************************
 -	PREPARE PLACEHOLDER FOR SLIDER	-
 ******************************************/
var setREVStartSize = function() {
    var tpopt = new Object();
    tpopt.startwidth = 1040;
    tpopt.startheight = 470;
    tpopt.container = jQuery('#rev_slider_2_1');
    tpopt.fullScreen = "off";
    tpopt.forceFullWidth = "off";

    tpopt.container.closest(".rev_slider_wrapper").css({height: tpopt.container.height()});
    tpopt.width = parseInt(tpopt.container.width(), 0);
    tpopt.height = parseInt(tpopt.container.height(), 0);
    tpopt.bw = tpopt.width / tpopt.startwidth;
    tpopt.bh = tpopt.height / tpopt.startheight;
    if (tpopt.bh > tpopt.bw)
        tpopt.bh = tpopt.bw;
    if (tpopt.bh < tpopt.bw)
        tpopt.bw = tpopt.bh;
    if (tpopt.bw < tpopt.bh)
        tpopt.bh = tpopt.bw;
    if (tpopt.bh > 1) {
        tpopt.bw = 1;
        tpopt.bh = 1
    }
    if (tpopt.bw > 1) {
        tpopt.bw = 1;
        tpopt.bh = 1
    }
    tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
    if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on")
        tpopt.height = tpopt.startheight;
    if (tpopt.fullScreen == "on") {
        tpopt.height = tpopt.bw * tpopt.startheight;
        var cow = tpopt.container.parent().width();
        var coh = jQuery(window).height();
        if (tpopt.fullScreenOffsetContainer != undefined) {
            try {
                var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                jQuery.each(offcontainers, function(e, t) {
                    coh = coh - jQuery(t).outerHeight(true);
                    if (coh < tpopt.minFullScreenHeight)
                        coh = tpopt.minFullScreenHeight
                })
            } catch (e) {
            }
        }
        tpopt.container.parent().height(coh);
        tpopt.container.height(coh);
        tpopt.container.closest(".rev_slider_wrapper").height(coh);
        tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
        tpopt.container.css({height: "100%"});
        tpopt.height = coh;
    } else {
        tpopt.container.height(tpopt.height);
        tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
        tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
    }
};

/* CALL PLACEHOLDER */
setREVStartSize();


var tpj = jQuery;
tpj.noConflict();
var revapi2;

tpj(document).ready(function() {

    if (tpj('#rev_slider_2_1').revolution == undefined)
        revslider_showDoubleJqueryError('#rev_slider_2_1');
    else
        revapi2 = tpj('#rev_slider_2_1').show().revolution(
                {
                    dottedOverlay: "none",
                    delay: 9000,
                    startwidth: 1040,
                    startheight: 470,
                    hideThumbs: 200,

                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 2,

                    navigationType: "bullet",
                    navigationArrows: "solo",
                    navigationStyle: "navbar-old",

                    touchenabled: "on",
                    onHoverStop: "on",

                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,

                    keyboardNavigation: "off",

                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 0,

                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,

                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,

                    shadow: 0,
                    fullWidth: "on",
                    fullScreen: "off",

                    spinner: "spinner3",

                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,

                    shuffle: "off",

                    autoHeight: "off",
                    forceFullWidth: "off",

                    hideTimerBar: "on",
                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResolution: 0,

                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0});




});	/*ready*/

        </script>
        <script>

            jQuery(document).ready(function($) {

                // portfolio Carousel /////////////////////////////
                try {

                    $("#pc-tt1").owlCarousel({
                        items: 4,
                        loop: true,
                        margin: 12,
                        nav: true,
                        navSpeed: 1000,
                        navText: ['<i class="icon-angle-right"></i>', '<i class="icon-angle-left"></i>'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 4000,
                        autoplaySpeed: 1000,
                        autoplayHoverPause: true,
                        responsive: {0: {items: 1, nav: false}, 480: {items: 2}, 768: {items: 4}}

                    });
                } catch (e) {
                }

                //End Document.ready//
            });
        </script>

    </body>
</html>
@show