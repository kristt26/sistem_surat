<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://randomuser.me/api/portraits/men/1.jpg" width="30%" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.html"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-copy"></i><span class="app-menu__label">Setup</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url('jenis'); ?>"><i class="icon fa fa-circle-o"></i> Jenis Surat</a></li>
                <li><a class="treeview-item" href="<?= base_url('unit'); ?>"><i class="icon fa fa-circle-o"></i> Unit Kerja</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-envelope-square
            "></i><span class="app-menu__label">Surat</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url('surat_masuk'); ?>"><i class="icon fa fa-circle-o"></i> Surat Masuk</a></li>
                <li><a class="treeview-item" href="<?= base_url('surat_keluar'); ?>"><i class="icon fa fa-circle-o"></i> Surat Keluar</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="<?= base_url('laporan'); ?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Laporan</span></a></li>
    </ul>
</aside>