<section class="sidebar">

    <!-- Menu -->
    
    <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">{{ __('content.mainmenu') }}</li>

        <!-- Dashboard Menu -->

        <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Panel</span></a></li>
        
        <!-- Project Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-certificate"></i>
                <span> {{ __('content.project') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                
                {{-- <li><a href="#"> Software </a></li> --}}
                {{-- <li><a href="#"> Servicios </a></li> --}}
                {{-- <li><a href="#"><i class="fa fa-book"></i> Level One</a></li> --}}
                <li class="treeview">
                    <a href="#"><i class="fa fa-book"></i> {{ __('content.workbook') }} 
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i> 
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li> --}}
                        <li class="treeview">
                            <a href="#"><i class="fa fa-file-text-o"></i> {{ __('content.documents') }} 
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                {{-- <li><a href="{{ route('dailyReports.index') }}"> {{ __('content.dailyreports') }} </a></li> --}}
                                {{-- <li><a href="{{ route('notes.index') }}"> {{ __('content.notes') }} </a></li> --}}
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.folios') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.dailyreports') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.notes') }} </a></li>
                            </ul>
                        </li>
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
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>

            </ul>
        </li>

        <!-- Purchases Menu -->

        <li class="treeview">

            <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span> {{ __('content.purchases') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            
            <ul class="treeview-menu">

                <li class="treeview">
                    <a href="#"><i class="fa fa-industry"></i> {{ __('content.materials') }} 
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
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-industry"></i> {{ __('content.assets') }} 
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
                                {{-- <li><a href="{{ route('dailyReports.index') }}"> {{ __('content.dailyreports') }} </a></li> --}}
                                {{-- <li><a href="{{ route('notes.index') }}"> {{ __('content.notes') }} </a></li> --}}
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.folios') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.dailyreports') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.notes') }} </a></li>
                            </ul>
                        </li>
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
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-industry"></i> {{ __('content.orders') }} 
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
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-industry"></i> {{ __('content.warehouse') }} 
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
                    </ul>
                </li>
                
                

                <li class="treeview">
                    <a href="#"><i class="fa fa-industry"></i> {{ __('content.assets') }} 
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
                                {{-- <li><a href="{{ route('dailyReports.index') }}"> {{ __('content.dailyreports') }} </a></li> --}}
                                {{-- <li><a href="{{ route('notes.index') }}"> {{ __('content.notes') }} </a></li> --}}
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.folios') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.dailyreports') }} </a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> {{ __('content.notes') }} </a></li>
                            </ul>
                        </li>
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
                    </ul>
                </li>

                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            </ul>

            
        </li>

        <!-- Management Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-line-chart"></i>
                <span> {{ __('content.persons') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"> Proveedores </a></li>
                <li><a href="#"> Cuentas </a></li>
                <li><a href="#"> Facturas </a></li>
                <li><a href="#"> Presupuestos </a></li>
            </ul>
        </li>

        <!-- Report Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-print"></i>
                <span> {{ __('content.assets') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"> Inventarios </a></li>
                <li><a href="#"> Registro Individual </a></li>
                <li><a href="#"> Historial de Uso </a></li>
                <li><a href="#"> Auditoria </a></li>
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
                {{-- <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li> --}}
                {{-- <li><a href="{{ route('locations.index')}}"> {{ __('content.locations') }} </a></li> --}}
                {{-- <li><a href="{{ route('turns.index')}}"> {{ __('content.turns') }} </a></li> --}}
                {{-- <li><a href="{{ route('contractors.index')}}"> {{ __('content.contractors') }} </a></li> --}}
                {{-- <li><a href="{{ route('equipments.index')}}"> {{ __('content.equipments') }} </a></li> --}}
                {{-- <li><a href="{{ route('positions.index')}}"> {{ __('content.positions') }} </a></li> --}}
                {{-- <li><a href="{{ route('sectors.index')}}"> {{ __('content.sectors') }} </a></li> --}}
                {{-- <li><a href="{{ route('users.index') }}"> {{ __('content.users') }} </a></li> --}}
                {{--  <li><a href="{{ route('offices.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('sectors.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('positions.index')}}"> {{ __('content.positions') }} </a></li>
                <li><a href="{{ route('oss.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('systems.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('cellularPlans.index')}}"> {{ __('content.roles') }} </a></li> --}}
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
                <li><a href="{{ route('roles.index') }}"> {{ __('content.roles') }} </a></li>
                {{-- <li><a href="{{ route('menus.index') }}"> {{ __('content.menus') }} </a></li> --}}
                <li><a href="{{ route('users.index') }}"> {{ __('content.users') }} </a></li>
                <li><a href="#"> {{ __('content.parameters') }} </a></li>
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
                <li><a href="#"> {{ __('content.guide') }} </a></li>
                <li><a href="#"> {{ __('content.about') }} </a></li>
            </ul>
        </li>

    </ul>
    
</section>