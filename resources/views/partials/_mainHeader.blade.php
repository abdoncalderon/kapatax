<!-- Logo -->

<a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>KPT</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Kapatax</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->

<nav class="navbar navbar-static-top">

    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
        
    <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

        <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->

            <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('images/admin/avatars/'.auth()->user()->avatar) }}" class="user-image" alt="User Image">
                <span class="hidden-xs"> 
                        @AUTH
                        {{ auth()->user()->name }}
                        @ENDAUTH</span>
                </a>

                <ul class="dropdown-menu">

                    <!-- User image -->

                    <li class="user-header">
                    <img src="{{ asset('images/admin/avatars/'.auth()->user()->avatar) }}" class="img-circle" alt="User Image">
                        <p>
                            @AUTH
                            {{ auth()->user()->name }}
                            @ENDAUTH</span>
                            {{-- <small>{{ auth()->user()->role->name }}</small> --}}
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ route('profiles.show', auth()->user()->id) }}" class="btn btn-default btn-flat">{{ __('content.profile') }}</a>
                        </div>
                        <div class="pull-right">
                            <a  href="#" @AUTH
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" 
                                        @ENDAUTH
                                class="btn btn-default btn-flat">{{ __('content.exit') }}
                            </a>
                            @AUTH
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @ENDAUTH
                        </div>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>