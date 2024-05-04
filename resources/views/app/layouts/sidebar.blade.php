<!-- Looping Menu -->
@can('siswa')
    <div class="menu">
        <div class="sidebar-heading pt-0" style="color: white;">
            Siswa
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('siswa/datadiri*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/datadiri/{{ $user->id }}">
                <i class="fas fa-user"></i>
                <span>Data Diri</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/tabungan*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/tabungan/siswa/{{ $user->id }}">
                <i class="fas fa-calculator"></i>
                <span>Tabungan</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/spp*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/spp/siswa/{{ $user->id }}">
                <i class="fas fa-calculator"></i>
                <span>SPP</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/administrasi*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/administrasi/siswa/{{ $user->id }}">
                <i class="fas fa-calculator"></i>
                <span>Biaya Administrasi</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/fisik*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/fisik/1">
                <i class="fas fa-fw fa-users"></i>
                <span>Perkembangan Fisik</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/raport*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/raport/lihat/{{ $user->id }}/see">
                <i class="fas fa-fw fa-book"></i>
                <span>Penilaian Raport</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/bank*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/bank">
                <i class="fas fa-fw fa-fax"></i>
                <span>Layanan Bank</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="background-color: white;">
    </div>
@endcan



@can('walas')
    <div class="menu">
        <div class="sidebar-heading pt-0" style="color: white;">
            Siswa
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('siswa/kelas*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/kelas/{{ $user->id }}">
                <i class="fas fa-school"></i>
                <span>Kelas</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/tabungan*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/tabungan/{{ $user->id }}">
                <i class="fas fa-calculator"></i>
                <span>Tabungan</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/spp*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/spp/{{ $user->id }}">
                <i class="fas fa-calculator"></i>
                <span>SPP</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/administrasi*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/administrasi/{{ $user->id }}">
                <i class="fas fa-calculator"></i>
                <span>Biaya Administrasi</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/fisik*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/fisik/1">
                <i class="fas fa-fw fa-users"></i>
                <span>Perkembangan Fisik</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/format_raport*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/format_raport">
                <i class="fas fa-fw fa-book"></i>
                <span>Format Raport</span></a>
        </li>
        <li class="nav-item {{ Request::is('siswa/raport*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/siswa/raport">
                <i class="fas fa-fw fa-book"></i>
                <span>Penilaian Raport</span></a>
        </li>
        <li class="nav-item {{ Request::is('acara/dokumentasi*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/acara/dokumentasi/{{ $user->id }}">
                <i class="fas fa-fw fa-camera"></i>
                <span>Dokumentasi</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="background-color: white;">
    </div>
@endcan

@can('admin')
    <div class="menu">
        <div class="sidebar-heading pt-0" style="color: white;">
            Admin
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('dashboard/lembaga*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/lembaga/sekolah">
                <i class="fas fa-school"></i>
                <span>Sekolah</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/pd*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/pd">
                <i class="fas fa-users"></i>
                <span>Peserta Didik</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/kelas*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/kelas">
                <i class="fas fa-home"></i>
                <span>Kelas</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/td*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/td">
                <i class="fas fa-user"></i>
                <span>Tendik</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/akunpd*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/akunpd">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Akun PD</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/bank*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/bank">
                <i class="fas fa-fw fa-fax"></i>
                <span>Layanan Bank</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/daftar_lulus*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/dashboard/daftar_lulus/all">
                <i class="fas fa-fw fa-users"></i>
                <span>Daftar Lulus</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="background-color: white;">
    </div>

    <div class="menu">
        <div class="sidebar-heading pt-0" style="color: white;">
            Acara
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('acara/pengumuman*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/acara/pengumuman">
                <i class="fa fa-fw fa-newspaper"></i>
                <span>Pengumuman</span></a>
        </li>
        <li class="nav-item {{ Request::is('acara/landing*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/acara/landing">
                <i class="fa fa-fw fa-camera"></i>
                <span>Landing Page</span></a>
        </li>
        <li class="nav-item {{ Request::is('acara/prestasi*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/acara/prestasi">
                <i class="fa fa-fw fa-file"></i>
                <span>Prestasi</span></a>
        </li>
        <li class="nav-item {{ Request::is('acara/dokumentasi*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/acara/dokumentasi/sekolah">
                <i class="fas fa-fw fa-camera"></i>
                <span>Dokumentasi</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="background-color: white;">
    </div>
@endcan

@can('bendahara')
    <div class="menu">
        <div class="sidebar-heading pt-0" style="color: white;">
            Keuangan
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('keuangan/administrasi*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/administrasi/tk_a">
                <i class="fas fa-fw fa-fax"></i>
                <span>Administrasi</span></a>
        </li>
        <li class="nav-item {{ Request::is('keuangan/info_adm*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/info_adm/all">
                <i class="fas fa-fw fa-book"></i>
                <span>Info Administrasi</span></a>
        </li>
        <li class="nav-item {{ Request::is('keuangan/pembayaran_adm*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/pembayaran_adm/all">
                <i class="fas fa-fw fa-calculator"></i>
                <span>Pembayaran Administrasi</span></a>
        </li>
        <li class="nav-item {{ Request::is('keuangan/spp*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/spp/tk_a">
                <i class="fas fa-fw fa-fax"></i>
                <span>SPP</span></a>
        </li>
        <li class="nav-item {{ Request::is('keuangan/info_spp*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/info_spp/all">
                <i class="fas fa-fw fa-book"></i>
                <span>Info SPP</span></a>
        </li>
        <li class="nav-item {{ Request::is('keuangan/pembayaran_spp*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/pembayaran_spp/all">
                <i class="fas fa-fw fa-calculator"></i>
                <span>Pembayaran SPP</span></a>
        </li>
        <li class="nav-item {{ Request::is('keuangan/laporan*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/laporan/tk/in">
                <i class="fas fa-fw fa-marker"></i>
                <span>Laporan Keuangan</span></a>
        </li>
        <li class="nav-item {{ Request::is('keuangan/tabungan*') ? 'active' : '' }}">
            <a class="nav-link pb-1 pt-0 pl-4" href="/keuangan/tabungan/all">
                <i class="fas fa-fw fa-calculator"></i>
                <span>Tabungan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="background-color: white;">
    </div>
@endcan

<div class="menu">
    <div class="sidebar-heading pt-0" style="color: white;">
        Profile
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('profile*') ? 'active' : '' }}">
        <a href="/profile" class="nav-link pb-1 pt-0 pl-4">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>
    <li class="nav-item {{ Request::is('ubah_pass*') ? 'active' : '' }}">
        <a class="nav-link pb-1 pt-0 pl-4" href="/ubah_pass">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>


</div>

