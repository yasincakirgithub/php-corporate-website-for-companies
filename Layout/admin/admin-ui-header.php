<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/Pages/Home/index.php" class="nav-link">Siteye Git</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link font-weight-bold" href="/Administrator/Auth/logout.php">Çıkış Yap</a>
      </li>
      <!-- Notifications Dropdown Menu -->
    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/Pages/Home/index.php" class="brand-link">
      <img src="../../Public/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kooperatif Logo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <i  style="line-height:34px;font-size:25px" class="text-light fas fa-user-shield img-circle "></i>
        </div>
        <div class="info">
          <a href="#" class="d-block font-weight-bold"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Ara" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
         
            
          <li class="nav-item">
            <a href="#" class="nav-link">
     <i class="fa fa-bars mr-2" aria-hidden="true"></i>
              <p>
                 Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
             <li class="nav-item">
            <a href="/Administrator/Menu/delete.php" class="nav-link">
       <i class="fa fa-edit mr-2" aria-hidden="true"></i>
              <p>
                Menu Düzenle
              </p>
            </a>
          </li>    
                
              <li class="nav-item">
            <a href="/Administrator/Menu/create.php"  class="nav-link">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i>
              <p>
                Menu Ekle
              </p>
            </a>
          </li>
             
            </ul>
          </li>      
            
            
            
            
            
            
            
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-sticky-note mr-2"></i>
              <p>
                Sayfalar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Administrator/Pages/create.php" class="nav-link">
               <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                  <p>Yeni Sayfa Oluştur</p>
                </a>
              </li>
                
               <li class="nav-item">
                <a href="/Administrator/Pages/delete.php" class="nav-link">
               <i class="fa fa-edit mr-2" aria-hidden="true"></i>
                  <p>Sayfa Düzenle</p>
                </a>
              </li>
                
                
                
                
            </ul>
          </li>
            
              <li class="nav-item">
            <a href="#" class="nav-link">
         <i class="fas fa-sliders-h mr-2"></i>
              <p>
                Anasayfa Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Administrator/Slider/create.php" class="nav-link">
               <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                  <p>Slider Ekle</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="/Administrator/Slider/delete.php" class="nav-link">
              <i class="fa fa-edit mr-2" aria-hidden="true"></i>
                  <p>Slider Düzenle</p>
                </a>
              </li>
            </ul>
          </li>
            
            
            <li class="nav-item">
            <a href="/Administrator/Contact/contact.php" class="nav-link">
         <i class="fa fa-phone mr-2" aria-hidden="true"></i>
              <p>
                İletişim
              </p>
            </a>
          </li>
            
            
            <li class="nav-item">
            <a href="/Administrator/SocialLinks/social_links.php" class="nav-link">
        <i class="fas fa-icons mr-2"></i>
              <p>
                Sosyal Medya
              </p>
            </a>
          </li>
            
            
            
             <li class="nav-item">
            <a href="#" class="nav-link">
        <i class="fas fa-users-cog mr-2"></i>
              <p>
                Yönetim Kurulu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="/Administrator/ManagementCouncil/create_mc.php" class="nav-link">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i>
              <p>
                Yönetici Ekle
              </p>
            </a>
          </li>
              <li class="nav-item">
            <a href="/Administrator/ManagementCouncil/management_council.php" class="nav-link">
       <i class="fa fa-edit mr-2" aria-hidden="true"></i>
              <p>
                Yöneticileri Düzenle
              </p>
            </a>
          </li>
            </ul>
          </li>
            
            <li class="nav-item">
            <a href="/Administrator/Messages/messages.php" class="nav-link">
                <i class="fas fa-sms mr-2"></i>
              <p>
                Mesajlar
              </p>
            </a>
          </li>
            
            
          <li class="nav-item">
            <a href="#" class="nav-link">
      
<svg id="Capa_1" enable-background="new 0 0 512 512" height="20" viewBox="0 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><g><g><path fill="white" d="m393.382 269.713h-171.728c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h171.728c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path fill="white" d="m393.382 302.039h-171.728c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h171.728c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path fill="white" d="m393.382 334.364h-171.728c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h171.728c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path fill="white" d="m393.382 366.689h-171.728c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h171.728c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path fill="white" d="m393.382 399.014h-171.728c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h171.728c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path fill="white" d="m393.382 431.339h-171.728c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h171.728c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path fill="white" d="m39.825 478.665h353.557c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-353.557c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z"/><path fill="white" d="m32.325 438.839c0 4.142 3.358 7.5 7.5 7.5h141.423c4.142 0 7.5-3.358 7.5-7.5v-161.626c0-4.142-3.358-7.5-7.5-7.5h-141.423c-4.142 0-7.5 3.358-7.5 7.5zm15-154.126h126.423v146.626h-126.423z"/><path fill="white" d="m400.882 101.445c0-4.142-3.358-7.5-7.5-7.5h-353.557c-4.142 0-7.5 3.358-7.5 7.5v135.362c0 4.142 3.358 7.5 7.5 7.5h353.557c4.142 0 7.5-3.358 7.5-7.5zm-15 127.862h-338.557v-120.362h338.557z"/><path fill="white" d="m69.425 211.982c4.142 0 7.5-3.358 7.5-7.5v-46.521l34.052 49.31c2.257 3.261 6.002 4.653 9.537 3.548 3.621-1.131 5.961-4.554 5.96-8.793l-.661-68.328c-.04-4.118-3.39-7.428-7.498-7.428-.024 0-.049 0-.074 0-4.142.04-7.467 3.43-7.427 7.572l.459 47.461-35.678-51.664c-1.865-2.701-5.269-3.875-8.403-2.898s-5.268 3.878-5.268 7.16v70.58c.001 4.143 3.359 7.501 7.501 7.501z"/><path fill="white" d="m150.687 211.982h29.795c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-22.295v-20.356h20.098c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-20.098v-20.355h22.295c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-29.795c-4.142 0-7.5 3.358-7.5 7.5v70.711c0 4.142 3.358 7.5 7.5 7.5z"/><path fill="white" d="m342.505 211.982c14.252 0 26.212-9.045 28.437-21.507 1.665-9.326-2.636-21.533-19.701-27.828-8.901-3.283-17.171-6.863-19.478-7.875-1.827-1.396-2.708-3.585-2.369-5.952.216-1.502 1.287-5.167 6.563-6.757 10.692-3.218 20.457 4.552 20.694 4.745 3.171 2.637 7.879 2.219 10.535-.942 2.665-3.17 2.255-7.901-.916-10.567-.645-.542-16.008-13.21-34.64-7.598-9.258 2.789-15.804 10.064-17.085 18.988-1.197 8.341 2.417 16.363 9.432 20.936.331.216.679.406 1.04.566.408.182 10.106 4.499 21.032 8.529 7.221 2.664 10.912 6.716 10.125 11.118-.803 4.495-6.135 9.144-13.67 9.144-7.399 0-14.534-2.998-19.084-8.019-2.782-3.069-7.524-3.303-10.594-.521-3.069 2.782-3.302 7.524-.521 10.594 7.348 8.107 18.637 12.946 30.2 12.946z"/><path fill="white" d="m219.227 204.875c.071.358.167.71.29 1.054 1.288 3.626 4.727 6.052 8.571 6.052h.061c3.869-.026 7.305-2.504 8.551-6.167.022-.065.043-.131.064-.197l14.35-46.362 14.286 46.373c.031.102.065.204.101.304 1.289 3.625 4.728 6.049 8.571 6.049h.062c3.868-.026 7.304-2.505 8.549-6.167.106-.311.191-.629.255-.951l13.832-69.499c.808-4.062-1.83-8.011-5.892-8.82-4.061-.806-8.011 1.829-8.82 5.892l-9.227 46.364-14.553-47.238-.043.013c-.731-2.233-2.491-4.092-4.907-4.84-3.957-1.223-8.157.99-9.382 4.947l-14.586 47.123-9.196-46.49c-.804-4.064-4.754-6.707-8.812-5.902-4.063.804-6.706 4.75-5.902 8.812z"/><path fill="white" d="m485.787.018c-.17-.007-.824-.018-.987-.018h-138.21c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h113.903c-1.85 3.671-2.893 7.816-2.893 12.2v170.3c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-170.3c-.051-6.594 5.645-12.292 12.429-12.212 6.319.081 11.966 5.868 11.971 12.682v438.93c0 16.763-14.309 30.4-31.896 30.4-.001 0-.001 0-.002 0s-.001 0-.002 0c-17.584 0-31.89-13.637-31.89-30.4v-56.63h11.69c15.274 0 27.7-12.426 27.7-27.7v-149.77c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v149.77c0 7.003-5.697 12.7-12.7 12.7h-11.69v-304.64c0-15.274-12.431-27.7-27.71-27.7h-349.08v-35.43c0-6.727 5.468-12.2 12.19-12.2h242.98c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-242.98c-14.993 0-27.19 12.202-27.19 27.2v35.43h-13.72c-15.274 0-27.7 12.426-27.7 27.7v221.14c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-221.14c0-7.003 5.697-12.7 12.7-12.7h377.8c7.008 0 12.71 5.697 12.71 12.7v376.27c0 11.681 4.58 22.346 12.093 30.4h-383.403c-17.59 0-31.9-13.637-31.9-30.4v-120.13c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v120.13c0 25.034 21.039 45.4 46.9 45.4h418.2.002s.001 0 .002 0c25.858 0 46.896-20.367 46.896-45.4v-438.93c0-14.983-11.515-27.13-26.213-27.652z"/></g></g></svg>
              <p class="ml-2">
                Haberler
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="/Administrator/News/create.php" class="nav-link">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i>
              <p>
                Haber Ekle
              </p>
            </a>
          </li>
              <li class="nav-item">
            <a href="/Administrator/News/delete.php" class="nav-link">
       <i class="fa fa-edit mr-2" aria-hidden="true"></i>
              <p>
                Haber Düzenle
              </p>
            </a>
          </li>
            </ul>
          </li>   
            
            
            
            
            
        <li class="nav-item">
            <a href="#" class="nav-link">
     <i class="fas fa-image mr-2"></i>
              <p>
                 Resimler
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
             <li class="nav-item">
            <a href="/Administrator/Images/delete.php" class="nav-link">
       <i class="fa fa-edit mr-2" aria-hidden="true"></i>
              <p>
                Resim Düzenle
              </p>
            </a>
          </li>    
                
              <li class="nav-item">
            <a href="/Administrator/Images/create.php" class="nav-link">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i>
              <p>
                Resim Ekle
              </p>
            </a>
          </li>
             
            </ul>
          </li> 
            
            
            
            
         <li class="nav-item">
            <a href="#" class="nav-link">
     <i class="fa fa-object-group mr-2" aria-hidden="true"></i>
              <p>
                 Galeri Grupları
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
             <li class="nav-item">
            <a href="/Administrator/Galeries/delete.php" class="nav-link">
       <i class="fa fa-edit mr-2" aria-hidden="true"></i>
              <p>
                Galeri Düzenle
              </p>
            </a>
          </li>    
                
              <li class="nav-item">
            <a href="/Administrator/Galeries/create.php" class="nav-link">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i>
              <p>
                Galeri Ekle
              </p>
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