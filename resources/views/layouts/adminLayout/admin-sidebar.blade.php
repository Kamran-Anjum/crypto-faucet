<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false">
                        <img src="{{ asset('images/backend-images/users/user-avatar.png') }}" class="rounded-circle ml-2" width="30">
                        <span class="hide-menu">{{ $app_settings->app_name }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/admin/dashboard')}}" class="sidebar-link">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/admin/view-meta-tags')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Meta Tags</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/admin/edit-timer')}}" class="sidebar-link">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Timer</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/admin/edit-set-reward')}}" class="sidebar-link">
                        <i class="mdi mdi-cash"></i>
                        <span class="hide-menu">Set Reward</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/admin/edit-per-day-limit')}}" class="sidebar-link">
                        <i class="mdi mdi-alert-circle-outline"></i>
                        <span class="hide-menu">Per Day Limit</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"  aria-expanded="false">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Home</span> 
                        <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1"></span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <li class="sidebar-item">
                            <a href="{{ url('/admin/edit-about-home')}}" class="sidebar-link">
                                <i class="mdi mdi-folder"></i>
                                <span class="hide-menu">Home About</span>
                            </a>
                        </li>

                    </ul>
                </li> 

                <li class="sidebar-item">
                    <a href="{{ url('/admin/view-about-us')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">About Us</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/admin/view-contact-messages')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Contact Message</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/admin/view-users')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>

                <!-- <li class="sidebar-item">
                    <a href="{{ url('/admin/edit-privacy-policy')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Privacy Policy</span>
                    </a>
                </li> -->

                <!-- <li class="sidebar-item">
                    <a href="{{ url('/admin/edit-terms-and-conditions')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Terms And Conditions</span>
                    </a>
                </li> -->

                <li class="sidebar-item">
                    <a href="{{ url('/admin/edit-site-setting')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Site Setting</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/admin/view-front-footer-item')}}" class="sidebar-link">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Front Footer Item</span>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
