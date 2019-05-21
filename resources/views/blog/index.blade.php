@extends('layouts.master')
@section('extra_inf')
<div class="breadcrumb-place ">
    <div class="row clearfix" >
        <h1 class="page-title">Listado de categorias</h1>
    </div><!-- row -->
</div><!-- breadcrumb -->
@endsection
@section('contenido')
<div class="row clearfix" >

    <div class="grid_8 posts">


        @forelse($categorias as $cat)

        <div class="post type-post format-standard has-post-thumbnail hentry clearfix" >
            <a href="" class="thumb-big" >
                <img src="images/790x527.jpg" alt="Image Alt"/>
            </a>

            <div class="meta-box">
                <h3><a href="single-quote.html">Shoplifting cases are very high risk cases</a></h3>

                <div class="meta-more">
                    <span><i class="icon-user"></i> <a href="#" title="Posts by admin" rel="author">admin</a></span>
                    <span><i class="icon-time"></i><a href="#">28th Oct 2015</a></span>
                    <span><i class="icon-comments"></i> <a href="#" title="Comment">No Comment</a></span>
                    <span><i class="icon-link"></i> in <a href="#" >Uncategorized</a></span>
                </div><!-- meta date -->

            </div>

            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, [&hellip;]</p>
            <a href="#" class="tbutton tbutton1 small"><span>Read more ›</span></a>

        </div><!-- post -->
        @empty
        @endforelse




        <!-- PAGINATION -->
        <div class="pagination-tt clearfix">
            <ul>
                <li><a href="#">&lt; Prev</a></li>
                <li><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>...</li>
                <li><a href="#">15</a></li>
                <li><a href="#">Next &gt;</a></li>
            </ul>
        </div>
        <!-- END PAGINATION -->


    </div><!-- grid 8 posts -->




</div><!-- row -->
@endsection
