<?php $roleMenus = session('roleMenus') ?>

<section class="sidebar">

    <!-- Menu -->
    
    <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">{{ __('content.mainmenu') }}</li>

        <!-- Dashboard Menu -->

        <!-- <li><a href="#"><i class="fa fa-home"></i> <span> {{ __('content.home') }} </span></a> </li> -->

        <!-- Home Menu -->

        <li class="treeview active">

            <a href="#">
                <i class="fa fa-home"></i>
                <span> {{ __('content.home') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>

            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('profiles.show', auth()->user()->id) }}"><i class="fa fa-user"></i> {{ __('content.profile') }} </a>
                </li>
                <li>
                    <a href="{{ route('myNeedRequests.index') }}">
                        <i class="fa fa-shopping-cart"></i>
                            {{ __('messages.myOrders') }} 
                        <span class="pull-right-container">
                            <small class="label pull-right bg-yellow">{{ my_pending_requests() }}</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-check"></i>
                            {{ __('messages.pendingApprovals') }} 
                        <span class="pull-right-container">
                            <small class="label pull-right bg-yellow">{{ my_pending_approvals() }}</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                            {{ __('content.notifications') }} 
                        <span class="pull-right-container">
                            <small class="label pull-right bg-yellow">12</small>
                        </span>
                    </a>
                </li>
            </ul>

        </li>

    @foreach ($roleMenus as $roleMenu)

        @if (empty($roleMenu->menu->father))

            <li class="treeview">

                @if (is_null($roleMenu->menu->route))
                    <a href="#">
                @else
                    <a href="{{ route($roleMenu->menu->route) }}">
                @endif

                        <i class="{{ $roleMenu->menu->icon }}"></i>
                        <span> {{ __($roleMenu->menu->showName) }} </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>

                    </a>

                @if (!$roleMenu->menu->menus->isEmpty())

                    <ul class="treeview-menu">

                        @foreach ($roleMenu->menu->menus as $submenu1)

                            @if (is_role_menu_active(current_user()->projectRole,$submenu1)==1)

                                @if(!$submenu1->menus->isEmpty())
                                    <li class="treeview">
                                @else
                                    <li>
                                @endif

                                    @if (is_null($submenu1->route))
                                        <a href="#"><i class="{{ $submenu1->icon }}"></i> {{ __($submenu1->showName) }} 
                                    @else
                                        <a href="{{ route($submenu1->route) }}"><i class="{{ $submenu1->icon }}"></i> {{ __($submenu1->showName) }} 
                                    @endif

                                        @if (!$submenu1->menus->isEmpty())
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i> 
                                            </span>
                                        @endif
                                        </a>
                                    @if (!$submenu1->menus->isEmpty())

                                        <ul class="treeview-menu">

                                            @foreach ($submenu1->menus as $submenu2 )

                                                @if (is_role_menu_active(current_user()->projectRole,$submenu2)==1)
                                                    
                                                    @if(!$submenu2->menus->isEmpty())
                                                        <li class="treeview">
                                                    @else
                                                        <li>
                                                    @endif

                                                        @if (is_null($submenu2->route))
                                                            <a href="#"><i class="{{ $submenu2->icon }}"></i> {{ __($submenu2->showName) }} 
                                                        @else
                                                            <a href="{{ route($submenu2->route) }}"><i class="{{ $submenu2->icon }}"></i> {{ __($submenu2->showName) }} 
                                                        @endif  
                                                            @if (!$submenu2->menus->isEmpty())
                                                                <span class="pull-right-container">
                                                                    <i class="fa fa-angle-left pull-right"></i> 
                                                                </span>
                                                            @endif
                                                            </a>

                                                        @if (!$submenu2->menus->isEmpty())

                                                            <ul class="treeview-menu">

                                                                @foreach ($submenu2->menus as $submenu3 )

                                                                    @if (is_role_menu_active(current_user()->projectRole,$submenu3)==1)

                                                                        @if (is_null($submenu3->route))
                                                                            <li><a href="#"><i class="{{ $submenu3->icon }}"></i> {{ __($submenu3->showName) }} </a></li>
                                                                        @else
                                                                            <li><a href="{{ route($submenu3->route) }}"><i class="{{ $submenu3->icon }}"></i> {{ __($submenu3->showName) }} </a></li>
                                                                        @endif

                                                                    @endif

                                                                @endforeach
                                                                
                                                            </ul>

                                                        @endif

                                                        </li>

                                                   @endif

                                            @endforeach

                                        </ul>   

                                    @endif

                                    </li>

                            @endif

                        @endforeach

                    </ul>

                @endif

            </li>

        @endif
           
    @endforeach
    
</section>