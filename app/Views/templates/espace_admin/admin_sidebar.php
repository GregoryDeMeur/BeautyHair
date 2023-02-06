<!-- Importation CSS Admin SideBar -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/admin_sidebar.css'); ?>">

<!-- Bootstrap container -->
<div class="container-fluid p-0" >
  

<!-- Bootstrap row -->
<div class="row" id="body-row" >
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded  d-none d-md-block">
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-light d-flex align-items-center menu-collapsed border-bottom border-top">
                <small>Panneau d'administration</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="/BeautyHair/AdminController/dashboard" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                
                    <span> <i class="fas fa-tachometer-alt mr-3"></i> </span> 
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
       

            <!-- Menu -->
            
            <a href="/BeautyHair/AdminController/admin_edit_profile" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            

            <!-- ------------------->

            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-light d-flex align-items-center menu-collapsed border-bottom border-top">
                <small>Gestion</small>
            </li>
            <!-- /END Separator -->


            <!-- -------------------->

            <!-- Menu with submenu -->
            <a href="/BeautyHair/AdminController/admin_show_users" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                
                    <span> <i class="fas fa-user mr-3"></i> </span> 
                    <span class="menu-collapsed">Utilisateurs</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>

            
            

            <!-------------------->

            <!-- -------------------->

            <!-- Menu with submenu -->
            <a href="/BeautyHair/AdminController/admin_show_salons" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                
                    <span> <i class="fas fa-store-alt mr-3"></i> </span> 
                    <span class="menu-collapsed">Salons</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
          

            <!-------------------->


            <!-- -------------------->

            <!-- Menu Gestion Speciality -->
            <a href="/BeautyHair/AdminController/admin_show_specialities" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                
                    <span> <i class="fas fa-graduation-cap mr-3"></i> </span> 
                    <span class="menu-collapsed">Spécialités</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
           

            <!-------------------->


            <!-- Menu Gestion Spéciality hairdresser -->
            <a href="#submenu5" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                
                    <span> <i class="fas fa-user-graduate mr-3"></i> </span> 
                    <span class="menu-collapsed">Assignement</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu Speciality -->
            <div id='submenu5' class="collapse sidebar-submenu">
                    <a href="/BeautyHair/AdminController/admin_show_assign_specialities" class="list-group-item list-group-item-action bg-dark text-white" id="higher">
                    <span class="menu-collapsed"><i class="fas fa-chevron-right fa-xs mr-2"></i></i>Assigner une spécialité à un coiffeur</span>
                    </a>
                    <a href="/BeautyHair/AdminController/admin_show_assign_hairdresser_to_salon" class="list-group-item list-group-item-action bg-dark text-white" id="higher">
                    <span class="menu-collapsed"><i class="fas fa-chevron-right fa-xs mr-2"></i></i>Assigner un coiffeur à un salon</span>
                    </a>
               
            </div>

            <!-------------------->


            <!---------------------->

            <!-- Menu Gestion Appointments -->
            <a href="/BeautyHair/AdminController/admin_show_appointments" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                
                    <span> <i class="far fa-calendar-check mr-3"></i> </span> 
                    <span class="menu-collapsed">Rendez-vous</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>

            <!-------------------->



            <!---------------------->

            <!-- Menu Gestion Speciality -->
            <a href="/BeautyHair/AdminController/admin_show_articles" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                
                    <span> <i class="far fa-file-alt mr-3"></i> </span> 
                    <span class="menu-collapsed">Articles</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
           

            <!-------------------->


             <!-- Separator without title -->
             <li class="list-group-item sidebar-separator-title text-light d-flex align-items-center menu-collapsed  border-bottom"> </li>
                        
            <!-- /END Separator -->
            
            <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Réduire</span>
                </div>
            </a>
            <!-------------------->




            <!-------------------->
            </a>
  
            <!-- Logo -->
            <li class="list-group-item logo-separator d-flex justify-content-center">
            <img src="<?php echo base_url()?>img/logo/BeautyHair_logo_only.png" width="70px" height="50px"/>    
            </li>   
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->

   

<script src="<?php echo base_url();?>js/admin_sideBar.js"></script>