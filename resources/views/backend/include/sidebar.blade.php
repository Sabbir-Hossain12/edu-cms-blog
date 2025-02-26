<!-- ========== Left Sidebar Start ========== -->

<style>

    #sidebar-menu > ul > li
    {
        margin-bottom: 10px;
        border-bottom: 1px solid #d2d2e0;
    }
</style>

<div class="vertical-menu">

    <div data-simplebar class="h-100">
        
     

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li class=""> 
                    <a href="{{route('admin.dashboard.index')}}">
                        <i class="fa-solid fa-home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                {{--About--}}
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-home"></i>
                        <span data-key="t-dashboard">About Section</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.abouts.index')}}">
                                <span data-key="t-calendar">About Management</span>
                            </a>
                        </li>



                    </ul>
                </li>
                {{--End About--}}

                <li class="">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-home"></i>
                        <span data-key="t-dashboard">Campus News</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.news.index')}}">
                                <span data-key="t-calendar">News Management</span>
                            </a>
                        </li>



                    </ul>
                </li>

                <li class="">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-home"></i>
                        <span data-key="t-dashboard">Academics</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.academics.index')}}">
                                <span data-key="t-calendar">Academics</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.academic-categories.index')}}">
                                <span data-key="t-calendar">Category</span>
                            </a>
                        </li>



                    </ul>
                </li>
                
                {{--  Events  --}}
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-home"></i>
                        <span data-key="t-dashboard">Events</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.events.index')}}">
                                <span data-key="t-calendar">Events Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- Health Care--}}
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-home"></i>
                        <span data-key="t-dashboard">Health Care</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.health-categories.index')}}">
                                <span data-key="t-calendar">Health Care Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-gear"></i>
                        <span data-key="t-apps">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.settings.index')}}">
                                <span data-key="t-calendar">Basic Info</span>
                            </a>
                        </li>
                      


                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-file"></i>
                        <span data-key="t-dashboard">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.pages.create')}}">
                                <span data-key="t-calendar">Create Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.pages.index')}}">
                                <span data-key="t-calendar">Pages List</span>
                            </a>
                        </li>


                    </ul>

                </li>
            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->