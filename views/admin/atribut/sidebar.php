<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">
                SIPKG
            </a>
            <a class="navbar-brand hidden" href="./">
                SIPKG
            </a>
        </div>
        <!-- begin:: sidebar -->
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= ($_REQUEST['content'] == "dashboard") ? 'active' : '' ?>">
                    <a href="dashboard">
                        <i class="menu-icon fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <h3 class="menu-title">Master</h3>
                <li class="<?= ($_REQUEST['content'] == "jabatan") ? 'active' : '' ?>">
                    <a href="jabatan">
                        <i class="menu-icon fa fa-list"></i>
                        Status
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "pangkat") ? 'active' : '' ?>">
                    <a href="pangkat">
                        <i class="menu-icon fa fa-list"></i>
                        Pangkat
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "pendidikan") ? 'active' : '' ?>">
                    <a href="pendidikan">
                        <i class="menu-icon fa fa-list"></i>
                        Jurusan
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "kriteria") ? 'active' : '' ?>">
                    <a href="kriteria">
                        <i class="menu-icon fa fa-list"></i>
                        Kriteria
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "kriteria_sub") ? 'active' : '' ?>">
                    <a href="kriteria_sub">
                        <i class="menu-icon fa fa-list"></i>
                        Kriteria Sub
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "kriteria_pen") ? 'active' : '' ?>">
                    <a href="kriteria_pen">
                        <i class="menu-icon fa fa-list"></i>
                        Kriteria Penilaian
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "kriteria_kat") ? 'active' : '' ?>">
                    <a href="kriteria_kat">
                        <i class="menu-icon fa fa-list"></i>
                        Kriteria Kategori
                    </a>
                </li>
                <h3 class="menu-title">Pustaka</h3>
                <li class="<?= ($_REQUEST['content'] == "guru") ? 'active' : '' ?>">
                    <a href="guru">
                        <i class="menu-icon fa fa-list"></i>
                        Guru
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "hasil") ? 'active' : '' ?>">
                    <a href="hasil">
                        <i class="menu-icon fa fa-list"></i>
                        Hasil Penilaian
                    </a>
                </li>
                <li class="<?= ($_REQUEST['content'] == "users") ? 'active' : '' ?>">
                    <a href="users">
                        <i class="menu-icon fa fa-users"></i>
                        Users
                    </a>
                </li>
                <h3 class="menu-title">Laporan</h3>
                <li class="<?= ($_REQUEST['content'] == "riwayat") ? 'active' : '' ?>">
                    <a href="riwayat">
                        <i class="menu-icon fa fa-list"></i>
                        Laporan Penilaian
                    </a>
                </li>
            </ul>
        </div>
        <!-- end:: sidebar -->
    </nav>
</aside>