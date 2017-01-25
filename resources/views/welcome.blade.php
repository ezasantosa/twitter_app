@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                   <!--  <input type="text" class="update_status"> -->
                   <body>
                    <div id="myCarousel" class="carousel slide"> <!-- slider -->
                     <div class="carousel-inner">
                    <div class="active item"> <!-- item 1 -->
                        <img src="{{URL::asset('upload/tw1.jpg')}}" alt="">
                    </div> <!-- end item -->
                    <div class="item"> <!-- item 2 -->
                        <img src="{{URL::asset('upload/tw4.png')}}" alt="">
                    </div> <!-- end item -->
                    <div class="item"> <!-- item 3 -->
                        <img src="{{URL::asset('upload/tw3.png')}}" alt="">
                    </div> <!-- end item -->
                </div> <!-- end carousel inner -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div> <!-- end slider -->
                    </body>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
$(window).load(function() {
    $('#myCarousel').carousel({
        interval: 3000
        })
    });

</script>
