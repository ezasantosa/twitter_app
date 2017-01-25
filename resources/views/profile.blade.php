@extends('layouts.app')
<style type="text/css">
.user {
  /*display: inline-block;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;*/
  position: relative;
  display: inline-block;
  width: 80%;
  height: 0;
  padding: 40% 0;
  border-radius: 50%;
  margin-left: 10%;
}

.one {
 /* background-image: url('http://placehold.it/350x150');*/
  background: #F0BAD0; 
}

#wrapper {
  margin-right: 200px;
}

#content {
  float: left;
  width: 20%;
  /*background-color: #CCF;*/
}
#sidebar {
  float: right;
  width: 80%;
 /* margin-right: -200px;*/
 /* background-color: #FFA;*/
}

.custom-file-upload {
  /*  border: 1px solid #ccc;*/
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

</style>
@section('content')
<div class="wrapper">
<form class="form-horizontal" id="form-profile">
  <!--   {{ csrf_field() }}    -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="content">
        <div class="user one">

        </div>
        <div style=" width: 50%; margin:0 auto; line-height: 1.4em; position: relative;">
            <label class="custom-file-upload">
                <input type="file" id="image" name="image" style="display:none" value="">
                 <i class="fa fa-cloud-upload"></i>Upload
            </label>
          
        </div>
      
    </div>
    <div id="sidebar">
        <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         @foreach ($users as $u)
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <!--  <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{$u->name}}">

                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <!--  <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{$u->email}}">

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <!--  <label for="password" class="col-md-4 control-label">Password</label>
 -->
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" value="{{$u->password}}">

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-10">
                                <button type="button" onClick="on_save()" class="btn btn-primary">
                                    <i class="fa fa-btn"></i> Save
                                </button>
                            </div>
                        </div>
                        @endforeach
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- <div id="cleared"></div> -->
  
</div>

@endsection


<script type="text/javascript">
var SITE_URL = "{{ url('') }}/";

function on_save () {
    data = $('#form-profile').serializeArray();

   // var image = $('#image')[0].files[0];
   // console.log(data);

        $.ajax({
           url: SITE_URL + 'user/save',
            type: 'POST',
            data: data,
            // data: {
            //     data_user: data,
            //     image: image.name
            // },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'JSON',
            beforeSend: function(){

            },
            success: function(data){
               location.reload(); 
             
            },
            error: function(xhr, status, error) {

            },
        });
        //

}



</script>
