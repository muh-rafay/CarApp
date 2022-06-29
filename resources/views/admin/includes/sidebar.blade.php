<div class="sidebar" data-color="white" data-active-color="primary">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color=" default | primary | info | success | warning | danger |"
  -->
    <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('assets/img/logo-small.png') }}">
            </div>
            <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
            Face Cairo
            <!-- <div class="logo-image-big">
              <img src="../assets/img/logo-big.png">
            </div> -->
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/faces/ayo-ogunseinde-2.jpg') }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                {{ Auth::user()->name }}
                <b class="caret"></b>
              </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini-icon">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini-icon">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini-icon">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}">
                                <span class="sidebar-mini-icon">LO</span>
                                <span class="sidebar-normal">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="">
                <a href="{{ route('admin.index') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ request()->is('category') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <p>Category</p>
                </a>
            </li>

            <li class="{{ request()->is('cars') ? 'active' : '' }}">
                <a href="{{ route('cars.index') }}">
                    <i class="fa fa-car"></i>
                    <p>Cars</p>
                </a>
            </li>
{{--            <li class="{{ request()->is('admin/board') ? 'active' : '' }}">--}}
{{--                <a data-toggle="collapse" href="#pagesExamples">--}}
{{--                    <i class="fa fa-clipboard"></i>--}}
{{--                    <p>--}}
{{--                        Boards <b class="caret"></b>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="pagesExamples">--}}
{{--                    <ul class="nav">--}}
{{--                        <li class="{{ request()->is('admin/board/create') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('board.create') }}">--}}
{{--                                <span class="sidebar-mini-icon">AB</span>--}}
{{--                                <span class="sidebar-normal"> Add Board </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ request()->is('admin/board') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('board.index') }}">--}}
{{--                                <span class="sidebar-mini-icon">VB</span>--}}
{{--                                <span class="sidebar-normal"> View Boards </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}


            <li class="{{ request()->is('users') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="nc-icon nc-circle-10"></i>
                    <p>Users</p>
                </a>
            </li>

        </ul>
    </div>
</div>
