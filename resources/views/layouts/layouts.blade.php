<!DOCTYPE html>
<html lang="en">
    
<!-- index.html Mon, 07 Nov 2016 11:41:09 GMT -->
<head>
        @include('includes.head')
		
</head>

    <body>
        
        <header>
            @include('includes.header')
        </header>

      @if (Auth::check())
        @if (auth()->user()->isAdmin())
        
        <section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    
					         @include('includes.sidebar')
                    
                </div><!-- leftpanel -->
                
                <div class="mainpanel">
                    <div class="contentpanel">
                       @yield('content')

                    </div><!-- contentpanel -->
                     <footer>
					 <!-- footer -->
                      <p class="col-xs-12 footer-copyright">
                        Powered by <b>PT. Arkamaya &copy; 2016</b>
                      </p>
                     </footer>
                </div>
            </div>
        </section>

        @else
           <section>
              <div class="mainwrapper">
                      <div class="contentpanel">
                         @yield('content')

                      </div><!-- contentpanel -->
                       <footer>
             <!-- footer -->
                        <p class="col-xs-12 footer-copyright">
                          Powered by <b>PT. Arkamaya &copy; 2016</b>
                        </p>
                       </footer>
              </div>
          </section>

        @endif
      @endif

      @if (Auth::guest())
            <section>
              <div class="mainwrapper">
                      <div class="contentpanel">
                         @yield('content')

                      </div><!-- contentpanel -->
                       <footer>
                        <p class="col-xs-12 footer-copyright">
                          Powered by <b>PT. Arkamaya &copy; 2016</b>
                        </p>
                       </footer>
              </div>
          </section>

      @endif
         

        @include('includes.footer');		
		@stack('js')
    </body>

<!-- index.html Mon, 07 Nov 2016 11:41:58 GMT -->
</html>
