<section class="sidebar">

    <!-- Menu -->
    
    <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">{{ __('content.mainmenu') }}</li>

        <!-- Dashboard Menu -->

        <!-- <li><a href="#"><i class="fa fa-home"></i> <span> {{ __('content.home') }} </span></a> </li> -->

        <!-- Home Menu -->

        @foreach ($menusUser as $menuUser)

            @if (empty($menuUser->menu->menu_id))
                <li class="treeview">
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
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                    {{ __('messages.myOrders') }} 
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-yellow">12</small>
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
            @endif
            
        @endforeach



        

        <li class="treeview">
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
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                            {{ __('messages.myOrders') }} 
                        <span class="pull-right-container">
                            <small class="label pull-right bg-yellow">12</small>
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

        <!-- Production Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-industry"></i>
                <span> {{ __('content.production') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>

            <ul class="treeview-menu">
                <li class="treeview">
                    <a href="#"><i class="fa fa-book"></i> {{ __('content.workbook') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i> 
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#"><i class="fa fa-file-text-o"></i> {{ __('content.documents') }} 
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.folios') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.dailyreports') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.notes') }} </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-print"></i> {{ __('content.reports') }} 
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.folios') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.dailyreports') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.notes') }} </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-cogs"></i> {{ __('content.settings') }} 
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.assignments') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.permits') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.locations') }} </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-truck"></i> {{ __('content.equipments') }} </a></li>
            </ul>
        </li>
        
        <!-- Commercial Menu -->

        <li class="treeview">

            <a href="#">
                <i class="fa fa-money"></i>
                <span> {{ __('content.commercial') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            
            <ul class="treeview-menu">

                <li class="treeview">
                    <a href="#"><i class="fa fa-shopping-cart"></i> {{ __('content.purchases') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i> 
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-check-square"></i> {{ __('content.orders') }} </a></li>
                        <li><a href="#"><i class="fa fa-file"></i> {{ __('content.agreements') }} </a></li>
                        <li><a href="#"><i class="fa fa-print"></i> {{ __('content.reports') }} </a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-industry"></i> {{ __('content.warehouse') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i> 
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-industry"></i> {{ __('content.warehouses') }} </a></li>
                        <li><a href="#"><i class="fa fa-cubes"></i> {{ __('content.materials') }} </a></li>
                        <li><a href="#"><i class="fa fa-print"></i> {{ __('content.reports') }} </a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-cube"></i> {{ __('content.assets') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i> 
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-pencil"></i> {{ __('content.record') }} </a></li>
                        <li><a href="#"><i class="fa fa-check-square"></i> {{ __('content.assignments') }} </a></li>
                        <li><a href="#"><i class="fa fa-refresh"></i> {{ __('content.updates') }} </a></li>
                        <li><a href="#"><i class="fa fa-print"></i> {{ __('content.reports') }} </a></li>
                    </ul>
                </li>
            </ul>
            
        </li>

        <!-- Persons Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span> {{ __('content.persons') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-list"></i> {{ __('content.payroll') }} </a></li>
                <li><a href="#"><i class="fa fa-table"></i> {{ __('content.timesheet') }} </a></li>
            </ul>
        </li>

        <!-- Safety & Health Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-stethoscope"></i>
                <span> {{ __('content.safetyAndHealth') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview">
                    <a href="#"><i class="fa fa-medkit"></i> {{ __('content.ppes') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-check-square"></i> {{ __('content.assignments') }} </a></li>
                        <li><a href="#"><i class="fa fa-list"></i> {{ __('content.rules') }} </a></li>
                        <li><a href="#"><i class="fa fa-print"></i> {{ __('content.reports') }} </a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-heart"></i> {{ __('content.health') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-folder-open"></i> {{ __('content.history') }} </a></li>
                        <li><a href="#"><i class="fa fa-calendar-check-o"></i> {{ __('content.dailyreport') }} </a></li>
                        <li><a href="#"><i class="fa fa-print"></i> {{ __('content.reports') }} </a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-sign-in"></i> {{ __('content.access') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-list"></i> {{ __('content.requirements') }} </a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.profiles') }} </a></li>
                        <li><a href="#"><i class="fa fa-institution"></i> {{ __('content.companies') }} </a></li>
                        <li><a href="#"><i class="fa fa-search"></i> {{ __('content.checkings') }} </a></li>
                        <li><a href="#"><i class="fa fa-print"></i> {{ __('content.reports') }} </a></li>
                    </ul>
                </li>
            </ul>
        </li>

        

        <!-- Settings Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-sliders"></i>
                <span>{{ __('content.configuration') }}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.project') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.zones') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.locations') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.contractors') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.departments') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.positions') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.brands') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.models') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.categories') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.types') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.periods') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.shifts') }} </a></li>
            </ul>
        </li>

        <!-- Administration Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-lock"></i>
                <span>{{ __('content.administration') }}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('companies.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.companies') }} </a></li>
                <li><a href="{{ route('divisions.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.divisions') }} </a></li>
                <li><a href="{{ route('regions.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.regions') }} </a></li>
                <li><a href="{{ route('countries.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.countries') }} </a></li>
                <li><a href="{{ route('states.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.states') }} </a></li>
                <li><a href="{{ route('cities.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.cities') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.subsidiaries') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.projects') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.sectors') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.unities') }} </a></li>
                <li><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('menus.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.menus') }} </a></li> 
                <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> {{ __('content.users') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.parameters') }} </a></li>

            </ul>
        </li>

        <!-- Help Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-question-circle-o"></i>
                <span>Ayuda</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.guide') }} </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.about') }} </a></li>
            </ul>
        </li>

    </ul>
    
</section>