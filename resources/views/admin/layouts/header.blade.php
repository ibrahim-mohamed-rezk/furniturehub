
<header class="main-header navbar">
    <div class="col-search">
    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i
                    class="material-icons md-apps"></i></button>
        <ul class="nav">
            <li class="nav-item">
                <form action="{{ route('create-update') }}" method="post" class="d-flex">
                    @csrf
                    <input type="radio" name="theme" id="theme"
                        value="{{ $theme == 'dark' ? 'light' : 'dark' }}" class="btn-check"
                        onchange="this.form.submit()">
                    <label for="theme" class="btn btn-secondary">
                        <i class="{{ $theme == 'light' ? 'fas fa-moon' : 'fas fa-sun text-warning' }}"></i>
                        Mode
                    </label>
                </form>
            </li>

            <li class="nav-item"><a class="nav-link btn-icon" href="{{route('web.index')}}" target="_blank"><i
                            class="material-icons md-cast"></i></a></li>

            <li class="nav-item"><a class="nav-link btn-icon" href="{{route('clear')}}" ><i
                            class="material-icons md-refresh" ></i></a></li>
            <li class="dropdown nav-item"><a class="dropdown-toggle" id="dropdownLanguage" data-bs-toggle="dropdown"
                                             href="#" aria-expanded="false"><i class="material-icons md-public"></i></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                    @if (getCurrentLocale() == 'ar')
                        <a class="dropdown-item text-brand" href="{{LaravelLocalization::getLocalizedUrl('en')}}">
                            <img src="{{ url('/public') }}/assets/admin/assets/imgs/theme/flag-us.png" alt="English">
                            English
                        </a>
                    @else
                        <a class="dropdown-item text-brand" href="{{LaravelLocalization::getLocalizedUrl('ar')}}">
                            <img src="{{ url('/public') }}/assets/admin/assets/imgs/theme/flag-eg.png" alt="English">
                            Arabic
                        </a>
                    @endif
                </div>
            </li>
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" id="dropdownAccount" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{asset(\Auth::user()->photo)}}" alt="User">
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="{{ request()->is('ar/affiliate*') || request()->is('affiliate*') ? route('profile_affiliate.index') : route('profile.index') }}">
                        <i class="material-icons md-perm_identity"></i>Edit Profile
                    </a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ request()->is('ar/affiliate*') || request()->is('affiliate*') ? route('affiliate_logout') : route('admin_logout') }}">
                        <i class="material-icons md-exit_to_app"></i>Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</header>