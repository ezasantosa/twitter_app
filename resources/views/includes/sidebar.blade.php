           @if (Auth::check())
                @if (auth()->user()->isAdmin())
                        <div class="media profile-left">

                            <a class="pull-left profile-thumb" href="profile.html" id="foto_profile">
                                 @if (file_exists('upload/images/'.Auth::user()->picture) and !empty(Auth::user()->picture))
                                    <img class="img-circle" src="{{ url('upload/images/'.Auth::user()->picture) }}" alt="">
                                @else
                                    <img class="img-circle" src="{{ url('upload/images/default.jpg') }}" alt="">
                                @endif
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{!! Session::get('name') !!}</h4>
                                <span class="user-options"><a href="#"><i class="glyphicon glyphicon-user"></i></a>
                                  <a href="#"><i class="glyphicon glyphicon-envelope"></i></a>
                                  <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                                  <a href="#"><i class="glyphicon glyphicon-log-out"></i></a>
    							</span>
                            </div>
                        </div><!-- media -->
          
                    
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
                            <li class="parent"><a href="#"><i class="fa fa-bars"></i> <span>Master Maintenance</span></a>
                                <ul class="children">
                                    <li><a href="{{ url('/user') }}">User</a></li>
                                    <li><a href="{{ url('/user_type') }}">Tipe User</a></li>
                                    <li><a href="{{ url('/item') }}">Item</a></li>
                                    <li><a href="{{ url('/item/unit') }}">Item Unit</a></li>
                                    <li><a href="{{ url('/category') }}">Kategori</a></li>
                                    <li><a href="{{ url('/category/sub') }}">Sub Kategori</a></li>
                                    <li><a href="{{ url('/department') }}">Departemen</a></li>
                                    <li><a href="{{ url('/department/budget') }}">Anggaran Departemen</a></li>
                                    <li><a href="{{ url('/section') }}">Bagian</a></li>
                                    <li><a href="{{ url('/position') }}">Jabatan</a></li>
                                    <li><a href="{{ url('/warehouse') }}">Gudang</a></li>
                                    <li><a href="{{ url('/warehouse/location') }}">Rak Gudang</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/order') }}"><i class="fa fa-bar-chart-o"></i> <span>Transaksi</span></a></li>
                            <li class="parent"><a href="#"><i class="fa fa-file-text"></i> <span>Laporan</span></a></li>
                    </ul>
            
                @endif  
            @endif        