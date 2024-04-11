<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Binary admin</a>
    </div>
    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="/admin/assets/img/find_user.png" class="user-image img-responsive" />
            </li>


            <li>
                <a class="active-menu" href="{{route('admin')}}"></i> Trang Chủ</a>
            </li>
            <li>
                <a href="{{route('Category.index')}}"> Danh mục</a>
            </li>
            <li>
                <a href="{{route('Product.index')}}"></i> Sản phẩm</a>
            </li>
            <li>
                <a href="{{route('oders.index')}}"> Hóa đơn</a>
            </li>
         
        </ul>

    </div>

</nav>
<script src="/admin/assets/js/jquery-1.10.2.js"></script>`
<!-- BOOTSTRAP SCRIPTS -->
<script src="/admin/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="/admin/assets/js/jquery.metisMenu.js"></script>
<!-- MORRIS CHART SCRIPTS -->
<script src="/admin/assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="/admin/assets/js/morris/morris.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="/admin/assets/js/custom.js"></script>
<script src="/dataTables/jquery.dataTables.js"></script>
<script src="/dataTables/dataTables.bootstrap.js"></script>
