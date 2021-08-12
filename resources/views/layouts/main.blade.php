<!DOCTYPE html>

<html lang="en">

    {{-- Page Head  --}}

    <head>
        <title>Kapatax @yield('title','')</title>
        @include('partials._head')
    </head>

    {{-- Body  --}}

    

    <body class="hold-transition skin-blue sidebar-mini">
        

        <div class="wrapper">

            {{-- App Header  --}}

            <header class="main-header">
                @include('partials._mainHeader')
            </header>

            {{-- Main Menu (Left Side)  --}}

            <aside class="main-sidebar">
                @include('partials._mainMenu')
            </aside>
        
            {{-- Content --}}

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        @yield('section')
                        <small>@yield('level')</small>
                    </h1>
                    @yield('breadcrumb')
                </section>
                @yield('mainContent')
            </div>
            
            {{-- Footer --}}

            <footer class="main-footer">
                @include('partials._mainFooter')
            </footer>

        </div>

        {{-- Scripts --}}
        
        @include('partials._scripts')

    </body>

</html>