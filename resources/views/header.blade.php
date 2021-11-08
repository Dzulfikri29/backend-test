<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row my-auto h-100">
                <li class="nav-item mobile-menu d-md-none mr-auto h-100"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item h-100">
                    <a class="navbar-brand h-100" href="{{ route('home') }}">
                        <img class="brand-logo company-logo-text" alt="SKA logo"
                            src="{{ asset('app-assets/images/logo/logo-text.png') }}" height="100%">
                        <img class="brand-logo company-logo d-none" alt="SKA logo"
                            src="{{ asset('app-assets/images/logo/logo.png') }}" height="100%">
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="fa fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Stack...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="avatar"><i></i></span>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                            <a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My
                                Inbox</a>
                            <a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a>
                            <a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i>
                                Chats</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
