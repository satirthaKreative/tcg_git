
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="javascript: ;" class="brand-link">
    <img src="<?= base_url(); ?>assets/admin_assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">TCG ADMIN</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url(); ?>assets/admin_assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="javascript: ;" class="d-block">Kreative Mechinez</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="<?= base_url('Dashboard'); ?>" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <i class="right fas fa-angle-left"></i> -->
            </p>
          </a>
        </li>
        <!-- user part -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('Dashboard/Users'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- advertizement part -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
            <p>
              Advertisement
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('Dashboard/advertise'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Advertisement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Dashboard/view_advertise'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Advertisement</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- vault part -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-clock"></i>
            <p>
              Vault Editor
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('Voult_Controller/'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Vault Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Voult_Controller/view_voult'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Vault Details</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Archetype Filter Part -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-adjust"></i>
            <p>
              Archetype Editor
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('Archetype_filter/'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Archetype Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Archetype_filter/view_archetype'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Archetype Details</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Desk Editor part -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Desk Editor
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('Admin_desk_controller/'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Desk Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Admin_desk_controller/view_platform'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Platform Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Admin_desk_controller/view_format'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Format Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Admin_desk_controller/view_communication'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Communication</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Denial Archtype Editor -->
        <li class="nav-item has-treeview">
          <a href="<?= base_url('Archetype_admin_controller/'); ?>" class="nav-link">
            <i class="nav-icon fa fa-eye"></i>
            <p>
              Denial Archetype View
              <!-- <i class="right fas fa-angle-left"></i> -->
            </p>
          </a>
        </li>
        <!-- admin profile part -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Admin Profile 
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('Dashboard/profile_details') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Admin_login/logout') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
