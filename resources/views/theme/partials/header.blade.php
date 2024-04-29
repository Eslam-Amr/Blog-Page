@php
    $headerCategory = App\Models\Category::take(2)->get();
@endphp
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('theme.index') }}"><img
                        src="{{ asset('assets') }}/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item @yield('home-active') "><a class="nav-link"
                                href="{{ route('theme.index') }}">Home</a></li>
                        <li class="nav-item submenu dropdown @yield('categories-active')">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Categories</a>
                            @if (count($headerCategory) > 0)

                                <ul class="dropdown-menu">
                                    @foreach ($headerCategory as $category)
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('theme.category',$category->id) }}">{{ $category->name }}</a></li>
                                    @endforeach

                                </ul>
                            @endif
                        </li>
                        <li class="nav-item @yield('contact-active')"><a class="nav-link"
                                href="{{ route('theme.contact') }}">Contact</a></li>
                    </ul>

                    <!-- Add new blog -->
                    @auth

                        <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary mr-2">Add New</a>
                    @endauth
                    <!-- End - Add new blog -->

                    <ul class="nav navbar-nav navbar-right navbar-social">
                        @guest

                            <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>
                        @endguest
                        @auth

                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Welcome ,{{ auth()->user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{  route('blogs.my-blogs')}}">My Blogs</a></li>
                                    <li class="nav-item">
                                        <form action="{{ route('logout') }}" id="logout_form" method="post">@csrf
                                            {{-- <button type="submit" class="nav-link border-0 w-100 text-left" >Logout</button> --}}
                                            <a class="nav-link" href="javascript:$('form#logout_form').submit();">Logout</a>

                                        </form>
                                    </li>
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
