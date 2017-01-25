<div class="headerwrapper">

      @if (Auth::check())
        @if (auth()->user()->isAdmin())

              <div class="header-left">
                  <a href="{{ url('/') }}" class="logo">
                      <img src="{{ asset('moldavite/images/logo-aisin-newest.png') }}" alt="logo" /> 
                  </a>
                  <div class="pull-right">
                      <a href="{{ url('/') }}" class="menu-collapse">
                          <i class="fa fa-bars"></i>
                      </a>
                  </div>
              </div>
        @else
              <div class="header-left">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('moldavite/images/logo-aisin-newest.png') }}" alt="logo" /> 
                    </a>
                </div>

        @endif
      @endif   

      @if (Auth::guest())
            <div class="header-left">
                  <a href="{{ url('/') }}" class="logo">
                      <img src="{{ asset('moldavite/images/logo-aisin-newest.png') }}" alt="logo" /> 
                  </a>
              </div>
      @endif





                <!-- header-left -->
                <div class="header-right">
                    <div class="pull-right">
                        
                         @if (Session::has('npk'))

                           <div id="profile" class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                             
                              <i class="fa fa-caret-down"></i>
                              </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Profil Saya</a></li>
                                <li><a onClick="on_logout()">Logout</a></li>
                             </ul>
                          </div><!-- btn-group -->

                         @else 

                         <div class="btn-group" style="margin-right:10px">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="user-name">Kategori</span>
                            <i class="fa fa-caret-down"></i>
                          </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              @foreach (App\ItemCategory::where('item_category_parent_id', '=','0')->get() as $category)

                                    @if (App\ItemCategory::where('item_category_parent_id', '=', $category->item_category_id)->count() == 0)
                                      <li><a href="{{ url('product/category/'.$category->item_category_id) }}">{{ $category->category_name }}</a></li>
                                    @else
                                      <li class="dropdown-submenu">
                                        <a tabindex="-1" href="{{ url('product/category/'.$category->item_category_id) }}" class="test">{{ $category->category_name }}</a>
                                        <ul class="dropdown-menu dropdown-menu-child">

                                      @foreach(App\ItemCategory::where('item_category_parent_id', '=', $category->item_category_id)->get() as $children)

                                          <li><a tabindex="-1" href="{{ url('product/category/'.$children->item_category_id) }}">{{ $children->category_name }}</a></li>

                                      @endforeach
                                        </ul>  
                                    @endif
                                  
                              @endforeach
                              
                            </ul>
                          </div>

                    
                          <!-- search bar -->
                          <form class="form form-search" action="{{ url('product/search') }}" method="get">
                              <input class="form-control" placeholder="Search" type="search" name="keyword">
                          </form>

                          <?php 

                          $data = Cart::content();
                          $regular = [];
                          $irregular = [];

                          foreach ($data as $index => $item) {

                              if ($item->options->type == 'regular') {
                                  $regular[$index] = $item->options->type;
                              }

                              else {
                                  $irregular[$index] = $item->options->type;
                              }
                          }

                          ?>

                          <!-- non reguler -->

                          @if (count($irregular) > 0)

                          <div class="btn-group btn-group-list btn-group-notification">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
                                <i class="fa fa-cart-plus"></i>
                                <span class="badge">{{ count($irregular) }}</span> Order Non Reguler</a>
                              </button>

                              <div class="dropdown-menu pull-right">
                                <h5>Keranjang Belanja Non Regular</h5>

                                <ul class="media-list dropdown-list">

                                  @foreach(Cart::content() as $row)

                                    @if ($row->options->type == 'irregular')
                                      <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="{{ url('upload/images/'.$row->options->picture) }}" alt="">
                                        <div class="media-body">
                                          <div class="row product">
                                            <div class="col-xs-10">
                                              <strong>{{ $row->name }} </strong>
                                              <small>(x{{ $row->qty }} {{ $row->options->unit }})</small>
                                            </div>
                                            <div class="col-xs-2">
                                              <a class="btn btn-xs btn-danger tooltips" href="{{ url('irregular/remove/'.$row->id.'/'.$row->rowId) }}" data-original-title="Hapus" data-toggle="tooltip" title=""><i class="fa fa-times"></i></a>
                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    @endif

                                  @endforeach
                                </ul>
                                <div class="dropdown-footer text-center">
                                  <a href="{{ url('irregular/checkout') }}" class="btn btn-success btn-xs"><i class="fa fa-cart-arrow-down"></i> List Pesanan</a>
                                </div>
                              </div><!-- dropdown-menu -->
                            </div>

                          @else

                          <div id="menu_login" class="btn-group btn-group-list">
                              <a type="button" class="btn btn-default dropdown-toggle" href="{{ url('/irregular') }}"><i class="fa fa-cart-plus" style="margin-right:10px"></i>
                              Order Non Reguler</a>
                          </div>

                          @endif

                          <!-- shopping cart -->

                            <div class="btn-group btn-group-list btn-group-notification">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
                                <i class="fa fa-shopping-cart"></i>
                                <span class="badge">{{ count($regular) }}</span>
                              </button>

                              <div class="dropdown-menu pull-right">
                                <h5>Keranjang Belanja</h5>
                              @if (count($regular) == 0)
                                <div class="dropdown-footer text-center">
                                  <p>Keranjang anda masih kosong</p>
                                </div>
                                @else
                                  <ul class="media-list dropdown-list">

                                  @foreach(Cart::content() as $row)

                                    @if ($row->options->type == 'regular')
                                      <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="{{ url('upload/images/'.$row->options->picture) }}" alt="">
                                        <div class="media-body">
                                          <div class="row product">
                                            <div class="col-xs-10">
                                              <strong>{{ $row->name }} </strong>
                                              <small>(x{{ $row->qty }} {{ $row->options->unit }})</small>
                                            </div>
                                            <div class="col-xs-2">
                                              <a class="btn btn-xs btn-danger tooltips" href="{{ url('product/remove/'. $row->rowId) }}" data-original-title="Hapus" data-toggle="tooltip" title=""><i class="fa fa-times"></i></a>
                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    @endif

                                  @endforeach
                                </ul>
                                <div class="dropdown-footer text-center">
                                  <a href="{{ url('product/checkout') }}" class="btn btn-success btn-xs"><i class="fa fa-cart-arrow-down"></i> List Pesanan</a>
                                </div>
                              @endif
                              </div><!-- dropdown-menu -->
                            </div>

                              @if (Auth::guest())

                                 
                                  <div id="menu_login" class="btn-group btn-group-list">
                                      <a type="button" class="btn btn-default dropdown-toggle" href="{{ url('/auth/login') }}"><i class="fa fa-lock" style="margin-right:10px"></i> Login</a>
                                  </div>

                                 @else

                                  <div class="btn-group btn-group-option">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        @if (file_exists('upload/images/'.Auth::user()->picture) and !empty(Auth::user()->picture))
                                        <img class="img-circle avatar-img" alt="" src="{{ url('upload/images/'.Auth::user()->picture) }}">
                                        @else
                                        <img class="img-circle avatar-img" alt="" src="{{ url('upload/images/default.jpg') }}">
                                        @endif
                                        <span class="user-name">{{ Auth::user()->name }}</span>
                                        <i class="fa fa-caret-down"></i>
                                      </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                          <li><a href="#"><i class="glyphicon glyphicon-user"></i> Profil Saya</a></li>
                                          <li class="divider"></li>
                                          <li><a href="{{ url('/auth/logout') }}"><i class="glyphicon glyphicon-log-out"></i>Log Out</a></li>
                                        </ul>
                                  </div>

                                @endif
                        @endif


                     
                       
                        
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->


@push('js')
<script src="{{ asset('js/dashboards.js') }}" type="text/javascript" ></script>
@endpush