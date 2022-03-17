 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-medkit"></i>
         </div>
         <div class="sidebar-brand-text mx-3">APOCHECKER</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-home"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Data
     </div>

     <!-- Persediaan -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#persediaan" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-table"></i>
             <span>Persediaan</span>
         </a>
         <div id="persediaan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Persediaan:</h6>
                 <a class="collapse-item" href="manajemen-persediaan.php">Data Persediaan</a>
                 <a class="collapse-item" href="grafik-persediaan.php">Grafik Persediaan</a>
             </div>
         </div>
     </li>

     <!-- Permintaan -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permintaan" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-table"></i>
             <span>Permintaan</span>
         </a>
         <div id="permintaan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Permintaan:</h6>
                 <a class="collapse-item" href="manajemen-permintaan.php">Data Permintaan</a>
                 <a class="collapse-item" href="grafik-permintaan.php">Grafik Permintaan</a>
             </div>
         </div>
     </li>

     <!-- Produksi -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produksi" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-table"></i>
             <span>Produksi</span>
         </a>
         <div id="produksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Produksi:</h6>
                 <a class="collapse-item" href="manajemen-produksi.php">Data Produksi</a>
                 <a class="collapse-item" href="grafik-produksi.php">Grafik Produksi</a>
             </div>
         </div>
     </li>

     <!-- Heading -->
     <div class="sidebar-heading">
         Manajemen
     </div>

     <!-- Manajemen Obat -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manajemenobat" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-folder"></i>
             <span>Manajemen</span>
         </a>
         <div id="manajemenobat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Manajemen:</h6>
                 <a class="collapse-item" href="manajemen-obat.php">Obat</a>
                 <a class="collapse-item" href="manajemen-kategori.php">Kategori</a>
                 <a class="collapse-item" href="manajemen-user.php">User</a>
             </div>
         </div>
     </li>

     <!-- Transaksi -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-folder"></i>
             <span>Transaksi</span>
         </a>
         <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Transaksi:</h6>
                 <a class="collapse-item" href="tambah-stok.php">Tambah Stok</a>
             </div>
         </div>
     </li>

     <!-- Laporan -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-folder"></i>
             <span>Laporan</span>
         </a>
         <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Laporan:</h6>
                 <a class="collapse-item" href="histori-penjualan.php">Histori Penjualan</a>
                 <a class="collapse-item" href="histori-pembelian.php">Histori Pembelian</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Addons
     </div>



     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="fuzzy.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Fuzzy</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


 </ul>
 <!-- End of Sidebar -->