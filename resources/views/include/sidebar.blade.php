<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            {{--            <img src="{{ asset('assets/images/profile.jpg') }}" class="logo-icon" alt="logo icon"> --}}
        </div>
        <div>
            <h4 class="logo-text">
                Tazkarti
            </h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">{{ __('words.dashboard') }}</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">{{ __('words.admins') }}</div>
            </a>
            <ul>
                @can('admin-list' . session('appKey'))
                    <li> <a href="{{ route('admin.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.admins') }}</a>
                    </li>
                @endcan
                @can('role-list' . session('appKey'))
                    <li><a href="{{ route('roles.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.roles') }}</a></li>
                @endcan
            </ul>
        </li>
                @can('user-list' . session('appKey'))
                    <li>
                        <a href="{{ route('users.index') }}">
                            <div class="parent-icon"><i class="bx bx-user"></i>
                            </div>
                            <div class="menu-title">{{ __('words.clients') }}</div>
                        </a>
                    </li>
                @endcan
        <li>
            <a href="{{ asset(route('statistics')) }}">
                <div class="parent-icon">
                    {{-- <i class='bx bx-cookie'></i> --}}
                    <i class="fa-solid fa-chart-simple"></i>
                </div>
                <div class="menu-title">Statistics</div>
            </a>
        </li>
        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-buildings"></i>
                </div>
                <div class="menu-title">{{ __('words.companies') }}</div>
            </a>
            <ul>
                @can('company-list' . session('appKey'))
    <li> <a href="{{ route('companies.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i>{{ __('words.companies') }}</a>
                        </li>
@endcan
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-category'></i>
                </div>
                <div class="menu-title">{{ __('words.categories') }}</div>
            </a>
            <ul>
                @can('company-list' . session('appKey'))
    <li> <a href="{{ route('category.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i>{{ __('words.categories') }}</a>
                        </li>
@endcan
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-buildings"></i>
                </div>
                <div class="menu-title">{{ __('words.packages') }}</div>
            </a>
            <ul>
                @can('company-list' . session('appKey'))
    <li> <a href="{{ route('package.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i>{{ __('words.packages') }}</a>
                        </li>
@endcan
            </ul>
        </li> -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-regular fa-calendar-check" style="color: #6c757d;"></i>
                </div>
                <div class="menu-title">{{ __('words.events') }}</div>
            </a>
            <ul>
                @can('admin-list' . session('appKey'))
                    <li> <a class="menu-title" href="{{ route('show') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.events') }}</a>
                    </li>
                @endcan
                @can('category-list' . session('appKey'))
                    <li> <a class="menu-title" href="{{ route('category.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.category') }}</a>
                    </li>
                @endcan
                {{--  @can('booking-list' . session('appKey'))
                    <li> <a class="menu-title" href="{{ route('booking.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.booking') }}</a>
                    </li>
                @endcan  --}}


            </ul>

        </li>
        @can('airline-list' . session('appKey'))
        <li>
            <a href="{{ route('airlineCountry.index') }}">
                <div class="parent-icon">
                    <i class="fa-solid fa-plane-up"></i>
                </div>

                <div class="menu-title">{{ __('words.airlines') }}</div>
            </a>


        </li>
        @endcan


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-regular fa-circle-check" style="color: #6c757d;"></i>
                </div>
                <div class="menu-title">Tickets</div>
            </a>
            <ul>
                @can('confirm-list' . session('appKey'))
                    <li> <a class="menu-title" href="{{ route('confirm.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>Ticket</a>
                    </li>
                    <li> <a class="menu-title" href="{{ route('checks.index') }}"><i
                        class="bx bx-right-arrow-alt"></i>Check in</a>
            </li>
            <li> <a class="menu-title" href="{{ route('email.show') }}"><i
                class="bx bx-right-arrow-alt"></i>Send Email</a>
    </li>

    <li> <a class="menu-title" href="{{ route('index.edit_ticket') }}"><i
        class="bx bx-right-arrow-alt"></i>Show tickets</a>
</li>
                @endcan
            </ul>
            </li>
        <li>


            <li>

                <ul>
                     {{-- <li> <a class="menu-title" href="{{ route('airports.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.airlines') }}</a>
                    </li>  --}}

                    {{--  @can('airline-list' . session('appKey'))  --}}
                        {{--  <li> <a class="menu-title" href=""><i
                                    class="bx bx-right-arrow-alt"></i>Send Email</a>
                        </li>  --}}
                    {{--  @endcan  --}}
                </ul>

            </li>
        {{--  <li>
    <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="fa-solid fa-hotel" style="color: #000000;"></i>
        </div>
        <div class="menu-title">Hotels</div>
    </a>
    <ul>
        <li> <a   class="menu-title" href="{{ route('hotels.index') }}"><i
                    class="bx bx-right-arrow-alt"></i>Hotels</a>
        </li>


    </ul>

</li>  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">{{ __('words.app_content') }}</div>
            </a>
            <ul>
                @can('companyPhone-list' . session('appKey'))
                    <li><a href="{{ route('phones.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.company_phones') }}</a></li>
                @endcan
                @can('companyEmail-list' . session('appKey'))
                    <li><a href="{{ route('emails.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.company_emails') }}</a></li>
                @endcan
                @can('policy-list' . session('appKey'))
                    <li><a href="{{ route('policy.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.company_policy') }}</a></li>
                @endcan
                @can('about-list' . session('appKey'))
                    <li><a href="{{ route('about.index') }}"><i
                                class="bx bx-right-arrow-alt"></i>{{ __('words.about_site') }}</a></li>
                @endcan
            </ul>
        </li>
    </ul>

</div>
