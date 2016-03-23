<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/img/user2-160x160.jpg',env('IS_SECURE'))}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
                <a href="#"><i class="fa fa-list-ol"></i> <span>Daftar Siswa</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-plus"></i> <span>Tambah Siswa</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-pie-chart"></i> <span>Grafik</span></a>
            </li>
            <li class="header">ADMIN</li>
            <li>
                <a href="#"><i class="fa fa-sign-out"></i> <span>Keluar</span></a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>