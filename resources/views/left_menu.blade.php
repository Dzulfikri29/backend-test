<div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span>Menu</span>
                <i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Menu"></i>
            </li>
            <li class="menu-dashboard">
                <a href="{{ route('home') }}">
                    <i class="ft-bar-chart"></i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="ft-server"></i>
                    <span class="menu-title" data-i18n="">Master</span>
                </a>
                <ul class="menu-content">

                    <li class="menu-item">
                        <a class="menu-item" href="{{ route('item.index') }}">Barang</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="ft-arrow-up-right"></i>
                    <span class="menu-title" data-i18n="">Penjualan</span>
                </a>
                <ul class="menu-content">
                    <li class="menu-quotation">
                        <a class="menu-quotation" href="{{ route('quotation.index') }}">Penawaran</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
