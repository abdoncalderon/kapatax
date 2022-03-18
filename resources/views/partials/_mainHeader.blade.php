<!-- Logo -->

<a href="{{ route('home') }}" class="logo">
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
    
    <!-- Project Name -->
    <ul class="nav navbar-nav ">
        <li style="margin-top:0.35em" class="nav-item">
            <h4 style="color:white">{{ current_user()->project->name }}</h4>
        </li>
    </ul>

    <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

        <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->

            <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('images/people/photos/'.current_user()->user->person->photo) }}" class="user-image" alt="User Image">
                    <span class="hidden-xs"> 
                            @auth
                                {{  current_user()->user->person->fullName }}
                            @endauth
                    </span>
                </a>

                <ul class="dropdown-menu">

                    <!-- User image -->

                    <li class="user-header">
                    <img src="{{ asset('images/people/photos/'.current_user()->user->person->photo) }}" class="img-circle" alt="User Image">
                        <p>
                            @auth
                                {{  current_user()->user->person->fullName }}
                            @endauth
                            </span>
                            <small>{{ current_user()->projectRole->role->name }}</small>
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    
                    

                    <li class="user-footer">
                        <div class="pull-left">
                            
                            <a href="{{ route('profiles.show', current_user()) }}" class="btn btn-default btn-flat">{{ __('content.profile') }}</a>
                        </div>
                        <div class="pull-right">
                            <a  href="#" @auth
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" 
                                        @endauth
                                class="btn btn-default btn-flat">{{ __('content.exit') }}
                            </a>
                            @auth
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endauth
                        </div>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>