<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar" style="background-color:#000000c9;    border-radius: 10px;">

    <div class="sidebar-brand d-none d-md-flex" style="    background: rgb(255 255 255 / 88%);    border-radius: 10px;">

        {{-- <svg class="sidebar-brand-full" width="118" height="46" alt="Sooprs Logo">

      <use xlink:href="{{ url('') }}/admin-assets/assets/img/sooprs_logo_blue_side.png"></use>

    </svg> --}}

        <a href="#"><img src="{{ url('') }}/admin-assets/assets/img/sooprs_logo_blue_side.png"
                alt="Sooprs Logo" style="    width:200px;"></a>



        {{-- <svg class="sidebar-brand-narrow" width="46" height="46" alt="Sooprs Logo">

      <img src="{{ url('') }}/admin-assets/assets/img/favicon_sooprs.png" alt="Sooprs Logo">

    </svg> --}}

    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">



        @can('dashboard-show')
            <li class="nav-item">

                <a class="nav-link" href="{{ route('admin.index') }}">

                    <svg class="nav-icon">

                        <use
                            xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer">

                        </use>

                    </svg> Dashboard

                    {{-- <span class="badge badge-sm bg-info ms-auto">NEW</span> --}}

                </a>

            </li>
        @endcan



        {{-- <li class="nav-title">Theme</li> --}}


        @can('banners-show')
            <li class="nav-item">

                <a class="nav-link" href="{{ route('all.banners') }}">

                    <svg class="nav-icon">



                        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-image">

                        </use>

                    </svg> Banners</a>

            </li>
        @endcan

        @can('customers-list')
            <li class="nav-item">

                <a class="nav-link" href="{{ route('all.customers') }}">

                    <svg class="nav-icon">



                        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-user">

                        </use>

                    </svg> Customers</a>

            </li>
        @endcan
        @can('professionals')
            <li class="nav-item">

                <a class="nav-link" href="{{ route('get.join.professionals') }}">

                    <svg class="nav-icon">



                        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-user">

                        </use>

                    </svg> Professionals</a>

            </li>
        @endcan

        @can('get-verified')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('get.verified') }}">
                  <svg class="nav-icon">
                      <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-user">
                      </use>
                  </svg> KYC Verification</a>
            </li>
        @endcan



        @can('leads-list')
            <li class="nav-item"><a class="nav-link" href="{{ route('all.leads') }}">

                    <svg class="nav-icon">

                        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-layers">

                        </use>

                    </svg> Leads</a>
            </li>
        @endcan
        @can('gigs-list')
            <li class="nav-item"><a class="nav-link" href="{{ route('all.gigs') }}">

                    <svg class="nav-icon">

                        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-layers">

                        </use>

                    </svg> Gigs</a>
            </li>
        @endcan
        {{-- <li class="nav-item"><a class="nav-link" href="{{ url('') }}/roles">
                    <svg class="nav-icon">
    
                      <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
    
                    </svg> Roles</a></li>
    
    
    
                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/users">
    
                        <svg class="nav-icon">
    
                          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
    
                        </svg> Users</a></li> --}}


        {{-- <li class="nav-title">Components</li> --}}

        {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
                    
                    <svg class="nav-icon">
                      
                          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-puzzle">
    
                          </use>
                          
                        </svg> Services</a>
                        
                        <ul class="nav-group-items">
                          
                        <li class="nav-item"><a class="nav-link" href="{{ route('all.services') }}"><span class="nav-icon"></span>
                          Services</a></li>
                          
                      </ul>
                      
                    </li> --}}

        @can('services-menu-show')
            {{-- New services table  --}}

            <li class="nav-group"><a class="nav-link nav-group-toggle" href="">

                    <svg class="nav-icon">

                        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-puzzle">

                        </use>

                    </svg> New Services</a>

                <ul class="nav-group-items">

                    <li class="nav-item"><a class="nav-link" href="{{ route('all.new.services') }}"><span
                                class="nav-icon"></span>
                            Services</a></li>

                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('all.questions') }}"><span
                                                  class="nav-icon"></span>Service Questions</a></li>

                                            <li class="nav-item"><a class="nav-link" href="{{ route('all.answers') }}"><span class="nav-icon"></span>Service
                                                Answers</a></li> --}}



                </ul>

            </li>
        @endcan

        @can('skills-menu-show')
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="">

                    <svg class="nav-icon">

                        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-puzzle">

                        </use>

                    </svg> Skills</a>

                <ul class="nav-group-items">

                    <li class="nav-item"><a class="nav-link" href="{{ route('all.skills') }}"><span
                                class="nav-icon"></span>
                            Skills</a></li>

                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('all.questions') }}"><span
                        class="nav-icon"></span>Service Questions</a></li>

                            <li class="nav-item"><a class="nav-link" href="{{ route('all.answers') }}"><span class="nav-icon"></span>Service
                      Answers</a></li> --}}



                </ul>

            </li>
        @endcan


        @can('countries-show')
            <li class="nav-item">

                <a class="nav-link" href="{{ route('all.countries') }}">

                    <i class="fa-solid fa-earth-americas me-4"></i> Countries

                    {{-- <span class="badge badge-sm bg-info ms-auto">NEW</span> --}}

                </a>

            </li>
        @endcan

        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('get.join.professionals') }}">
      <svg class="nav-icon">
        <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
      </svg> Professionals</a></li> --}}



        {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>

        </svg> Website Services Page</a>

      <ul class="nav-group-items">

        

        <li class="nav-item"><a class="nav-link" href="{{ route('all.services.page') }}"><span
              class="nav-icon"></span>Service Pages</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageCategories') }}"><span
          class="nav-icon"></span>Page Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageCategories') }}"><span
            class="nav-icon"></span>Meta Tags</a></li>

      </ul>

    </li> --}}

        @can('access-menu-show')
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="">

                    <svg class="nav-icon">

                        <use
                            xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked">

                        </use>

                    </svg> Access Control</a>

                <ul class="nav-group-items">

                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/roles">

                            <svg class="nav-icon">

                                <use
                                    xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-layers">

                                </use>

                            </svg> Roles</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('all.permissions') }}">

                            <svg class="nav-icon">

                                <use
                                    xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-layers">

                                </use>

                            </svg> Permissions</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/users">

                            <svg class="nav-icon">

                                <use
                                    xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-people">

                                </use>

                            </svg> Users</a></li>





                </ul>

            </li>
        @endcan

        @can('settings-show')
            <li class="nav-item">

                <a class="nav-link" href="{{ route('all.settings') }}">

                    <i class="fa-solid fa-earth-americas me-4"></i> Settings

                    {{-- <span class="badge badge-sm bg-info ms-auto">NEW</span> --}}

                </a>

            </li>
        @endcan

        {{-- <li class="nav-item"><a class="nav-link" href="charts.html">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>

        </svg> Charts</a></li> --}}

        {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-notes"></use>

        </svg> Forms</a>

      <ul class="nav-group-items">

        <li class="nav-item"><a class="nav-link" href="forms/form-control.html"> Form Control</a></li>

        <li class="nav-item"><a class="nav-link" href="forms/select.html"> Select</a></li>

        <li class="nav-item"><a class="nav-link" href="forms/checks-radios.html"> Checks and radios</a></li>

        <li class="nav-item"><a class="nav-link" href="forms/range.html"> Range</a></li>

        <li class="nav-item"><a class="nav-link" href="forms/input-group.html"> Input group</a></li>

        <li class="nav-item"><a class="nav-link" href="forms/floating-labels.html"> Floating labels</a></li>

        <li class="nav-item"><a class="nav-link" href="forms/layout.html"> Layout</a></li>

        <li class="nav-item"><a class="nav-link" href="forms/validation.html"> Validation</a></li>

      </ul>

    </li> --}}

        {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>

        </svg> Icons</a>

      <ul class="nav-group-items">

        <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span
              class="badge badge-sm bg-success ms-auto">Free</span></a></li>

        <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons - Brand</a></li>

        <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons - Flag</a></li>

      </ul>

    </li> --}}

        {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>

        </svg> Notifications</a>

      <ul class="nav-group-items">

        <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span class="nav-icon"></span>
            Alerts</a></li>

        <li class="nav-item"><a class="nav-link" href="notifications/badge.html"><span class="nav-icon"></span>
            Badge</a></li>

        <li class="nav-item"><a class="nav-link" href="notifications/modals.html"><span class="nav-icon"></span>
            Modals</a></li>

        <li class="nav-item"><a class="nav-link" href="notifications/toasts.html"><span class="nav-icon"></span>
            Toasts</a></li>

      </ul>

    </li> --}}

        {{-- <li class="nav-item"><a class="nav-link" href="widgets.html">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>

        </svg> Widgets<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li> --}}

        {{-- <li class="nav-divider"></li> --}}

        {{-- <li class="nav-title">Extras</li> --}}

        {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>

        </svg> Pages</a>

      <ul class="nav-group-items">

        <li class="nav-item"><a class="nav-link" href="login.html" target="_top">

            <svg class="nav-icon">

              <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>

            </svg> Login</a></li>

        <li class="nav-item"><a class="nav-link" href="register.html" target="_top">

            <svg class="nav-icon">

              <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>

            </svg> Register</a></li>

        <li class="nav-item"><a class="nav-link" href="404.html" target="_top">

            <svg class="nav-icon">

              <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-bug"></use>

            </svg> Error 404</a></li>

        <li class="nav-item"><a class="nav-link" href="500.html" target="_top">

            <svg class="nav-icon">

              <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-bug"></use>

            </svg> Error 500</a></li>

      </ul>

    </li> --}}

        {{-- <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/"
        target="_blank">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-description"></use>

        </svg> Docs</a></li> --}}

        {{-- <li class="nav-item"><a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">

        <svg class="nav-icon">

          <use xlink:href="{{ url('') }}/admin-assets/vendors/@coreui/icons/svg/free.svg#cil-layers"></use>

        </svg> Try CoreUI

        <div class="fw-semibold">PRO</div>

      </a></li> --}}

    </ul>

    {{-- <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button> --}}

</div>
