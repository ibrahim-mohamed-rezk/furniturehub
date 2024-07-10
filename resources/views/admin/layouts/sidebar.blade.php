<div class="screen-overlay"></div>
<aside class="navbar-aside" id="offcanvas_aside">
    @if (getCurrentLocale() == 'en')
        <div class="aside-top"><a class="brand-wrap" href="{{ url(route('admin_home')) }}"><img class="logo"
                    src="{{ asset(settings('logo')) }}" alt="Evara Dashboard"></a>
            <div>
                <button class="btn btn-icon btn-aside-minimize">
                    <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div>
    @else
        <div class="aside-top"><a class="brand-wrap" href="{{ url(route('admin_home')) }}"><img class="logo"
                    src="{{ asset(settings('logo_ar')) }}" alt="Evara Dashboard"></a>
            <div>
                <button class="btn btn-icon btn-aside-minimize">
                    <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div>
    @endif


    <nav>
        <ul class="menu-aside">
            <li class="menu-item">
                <a class="menu-link"
                    href="{{ request()->is('ar/affiliate*') || request()->is('affiliate*') ? route('affiliate_home') : route('admin_home') }}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">{{ __('dashboard.dashboard') }}</span>
                </a>
            </li>
        </ul>
        <hr>
        <ul class="menu-aside">
            @foreach ($userNodules as $module)
                @if (in_array($module['path'], $special_modules))
                    <li class="menu-item"><a class="menu-link" href="{{ route($module['path'] . '.index') }}"><i
                                class="{{ __($module['path'] . '.menuIcon') }}"></i> <span
                                class="text">{{ __($module['path'] . '.index') }}</span></a></li>
                @elseif(in_array($module['path'], $stop_modules))

                @elseif(in_array($module['path'], $sub_modules))
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="#">
                            <i class="{{ __($module['path'] . '.menuIcon') }}"> </i>
                            <span class="text">{{ __($module['path'] . '.index') }}
                            </span>
                        </a>
                        <div class="submenu">
                            <a href="{{ route($module['path'] . '.index') }}">{{ __($module['path'] . '.index') }}</a>
                            <a href="{{ route('subcategories.index') }}">{{ __('subcategories.index') }}</a>
                            <a
                                href="{{ route($module['path'] . '.create') }}">{{ __($module['path'] . '.create') }}</a>
                        </div>
                    </li>
                @else
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="#">
                            <i class="{{ __($module['path'] . '.menuIcon') }}"> </i>
                            <span class="text">{{ __($module['path'] . '.index') }}
                            </span>
                        </a>
                        <div class="submenu">
                            <a href="{{ route($module['path'] . '.index') }}">{{ __($module['path'] . '.index') }}</a>
                            <a
                                href="{{ route($module['path'] . '.create') }}">{{ __($module['path'] . '.create') }}</a>
                        </div>
                    </li>
                @endif
            @endforeach

            <li class="menu-item"><a class="menu-link"
                    href="{{ request()->is('ar/affiliate*') || request()->is('affiliate*') ? route('affiliate_logout') : route('admin_logout') }}"><i
                        class="icon material-icons md-settings"></i><span
                        class="text">{{ __('dashboard.logout') }}</span></a></li>
        </ul>
    </nav>
</aside>
