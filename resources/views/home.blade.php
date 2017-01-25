@extends('layouts.app')
<style type="text/css">
.user {
  display: inline-block;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
/*  margin-left: 50px;*/
}

.one {
  background-image: url('http://placehold.it/350x150');
 /* background: #F0BAD0; */
}
/*#rectangle{
    width:100%;
    height:20%;
    background:blue;
}*/


</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Timeline</div>
                <form id="form-status">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <!--  <input id="status" type="text" class="form-control" placeholder="Apa yang anda pikirkan" name="status"> -->
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <textarea class="form-control" rows="2" id="status" placeholder="Apa yang anda pikirkan" name="status"></textarea>
                        </div>           
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-10">
                            <button type="button" type="button" onclick="on_save_status()" id="btn-save-status" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
                <br/><br/><br/>

            <!--  <div id="wrapper">
                <div id="left" style="float: left; width: 90%; background: #DDDDDD; height: 40%;"> 
                    left column
                </div>
                <div id="right" style="float: right; width: 10%; height:40%; background: #EEEEEE;">
                   <div id="right" class="user one" style="width:10%; height:20%; float:right;">
                          
                    </div>
                </div>
            </div> -->

             @foreach ($data as $d)

                @if(Auth::user()->id == $d->user_id) 
               <!--  <div id="wrapper" style="width:100%; height:20%;background-color:#F0F8FF"> -->
                    <div id="rectangle" class="col-md-10" style="width:90%; height:20%; float: left; text-align: right;background-color:#F0F8FF">
                         {{$d->status}}  - <font style="font-style: italic"> {{$d->name}} </font>
                    </div>
                    <div id="right" class="user one" style="width:10%; height:20%; float:right;background-color:#F0F8FF">
                          
                    </div>
                    <div id="foot" style="clear:both;background: #white;">
                    
                    </div>
                <br/>

                @else
               
                    <div id="left" class="user one" style="width:10%; height:20%; float:left;background-color:#FFF8DC">
                    </div>   
                    <div id="rectangle-left" class="col-md-10" style="width:90%; height:20%;float:right; text-align: left; background-color:#FFF8DC">
                         <font style="font-style: italic"> {{$d->name}} </font> - {{$d->status}}
                    </div>
                     <div id="foot" style="clear:both;background: #white;">
                    
                    </div>
                    <br/>
                @endif
            

                   <!--  <div width="100%" height="100%">
                      <rect x="50" y="20" rx="20" ry="20" width="80%" height="50%" style="fill:red;stroke:black;stroke-width:5;opacity:0.5">
                           
                    </div>
                    <br/>
 -->
                    <!-- <div></div> </br> -->
                  

            @endforeach

               <!--  <div class="panel-heading"></div> -->
               <br/>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
var SITE_URL = "{{ url('') }}/";
var homeTable;

$(document).ready(function(){



});

function on_save_status () {
    data = $('#form-status').serializeArray();
    console.log(data);

        $.ajax({
            url: SITE_URL + 'home/save',
            type: 'POST',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'JSON',
            beforeSend: function(){
             
            },
            success: function(data){
                location.reload(); 
                document.getElementById("form-status").reset();

            },
            error: function(xhr, status, error) {

    

            },
        });
    

}
</script>
