        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('title-bar')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('change-language', ['en']) }}" class="a_lang"><img class="icon-lang" src="{{ asset('img/united-kingdom.png') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('change-language', ['vi']) }}" class="a_lang"><img class="icon-lang" src="{{ asset('img/vietnam.png') }}" alt=""></a>
                        </li>
                        @if(Auth::check())
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        {{ Auth::user()->name }}
                                        <b class="caret"></b>
                                    </p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">{{ trans('partials/navbar.profile') }}</a></li>
                                <li><a href="#">{{ trans('partials/navbar.setting') }}</a></li>
                                <li><a href="#">{{ trans('partials/navbar.about') }}</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ URL::route('logout') }}">{{ trans('partials/navbar.log_out') }}</a></li>
                              </ul>
                        </li>
                        @else
                            <li>
                                <a href="{{ URL::route('register') }}">
                                    <p>{{ trans('partials/navbar.register') }}</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::route('login') }}">
                                    <p>{{ trans('partials/navbar.log_in') }}</p>
                                </a>
                            </li>
                        @endif
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>