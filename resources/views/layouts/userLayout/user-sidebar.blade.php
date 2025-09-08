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
                            <a href="{{ url('/user/dashboard')}}" class="sidebar-link">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <!-- referral -->
                        <li class="sidebar-item">
                            <a href="{{ url('/user/referral')}}" class="sidebar-link">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Referrals</span>
                            </a>
                        </li>

                        <!-- faucet -->
                        <li class="sidebar-item">
                            <a href="{{ url('/user/faucet')}}" class="sidebar-link">
                                <i class="mdi mdi-clipboard-check"></i>
                                <span class="hide-menu">Faucet</span>
                            </a>
                        </li>

                        <!-- withdrawal -->
                        <li class="sidebar-item">
                            <a href="{{ url('/user/withdrawal')}}" class="sidebar-link">
                                <i class="mdi mdi-clipboard-check"></i>
                                <span class="hide-menu">Withdrawal</span>
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
