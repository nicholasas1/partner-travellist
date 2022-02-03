 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://travellist.id/wp-content/uploads/2022/01/LOGO-2-NO-BACKGROUND-3.png" alt="AdminLTE Logo" 
           style="opacity: .8">
      <span class="brand-text font-weight-light">TRAVELLIST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            $user_id = $_SESSION['user_id'];
              $api = "https://api.travellist.id/user-detail.php?user_id=$user_id";
              $json = file_get_contents($api);
              $hasil = json_decode($json);
              $data = $hasil->result;
              foreach ($data as $key) {
                if($key->key == "wilcity_avatar"){
                    $user_foto = $key->value;
                }else{
                    $user_foto = "http://scymark.semarangkota.go.id/daftar-aplikasi/kategori/20190201025730icon_user.png";
                }
              }
          ?>
          <img src="<?php echo $user_foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php 
            echo $_SESSION['name'];
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Order
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Listing
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">5</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="destination-get-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Destination</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accomodation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Culinary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rent-get-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rent </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xperience</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Create Listing
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">5</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="destination-get-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Destination</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accomodation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Culinary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="create-rent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Rent </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xperience</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Withdraw
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Calender
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="notification.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Notification
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Message
              </p>
            </a>
          </li>
            </ul>
          </li>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>