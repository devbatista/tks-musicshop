<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">MusicShop</h4>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('admin') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                        <div class="menu-title">Home</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('albuns.index') }}">
                        <div class="parent-icon"><i class="bx bx-book-alt"></i></div>
                        <div class="menu-title">Albuns</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('compras') }}">
                        <div class="parent-icon"><i class="bx bx-cart"></i></div>
                        <div class="menu-title">Compras</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->