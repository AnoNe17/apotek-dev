<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard*') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('produk*') ? '' : 'collapsed' }}" data-bs-target="#produk-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="produk-nav" class="nav-content {{ Request::is('produk*') ? 'show' : 'collapse' }} " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('produk.kategori') }}" class="{{ Request::is('produk/kategori*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.fungsional') }}" class="{{ Request::is('produk/fungsional*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Fungsional</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk') }}" class="{{ Request::is('produk/data*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Produk</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('blog*') ? '' : 'collapsed' }}" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Informasi Kesehatan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="blog-nav" class="nav-content {{ Request::is('blog*') ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('blog.kategori') }}" class="{{ Request::is('blog/kategori*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.postingan') }}" class="{{ Request::is('blog/postingan*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Postingan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('saran*') ? '' : 'collapsed' }}" href="{{ route('saran') }}">
                    <i class="bi bi-grid"></i>
                    <span>Kritik & Saran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('layanan*') ? '' : 'collapsed' }}" href="{{ route('layanan') }}">
                    <i class="bi bi-grid"></i>
                    <span>Layanan</span>
                </a>
            </li>

            <li class="nav-heading">Pengaturan</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('setting*') ? '' : 'collapsed' }}" href="{{ route('setting.web') }}">
                    <i class="bi bi-globe"></i>
                    <span>Pengaturan Website</span>
                </a>
            </li>
            <!-- End Settings Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->