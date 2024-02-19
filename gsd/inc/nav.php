<?php 
  include '../conn.php';
  date_default_timezone_set('Asia/Manila');
   
?>
   
<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between bg-dark text-light">
          <a href="index.php" class="text-nowrap logo-img">
          
            <h5 class="text-light">Guidance PANEL</h5>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="reports.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Report Violation</span>
              </a>
            </li>

            
            <li class="sidebar-item">
              <a class="sidebar-link" href="list_reports.php" aria-expanded="false">
                <span>
                <i class="bi bi-send-fill"></i>
                </span>
                <span class="hide-menu">My Reports</span>
              </a>
            </li>

                  
            <li class="sidebar-item">
              <a class="sidebar-link" href="sanctions.php" aria-expanded="false">
                <span>
                <i class="bi bi-list-ol"></i>
                </span>
                <span class="hide-menu">Sanctions</span>
              </a>
            </li>

            
                  
            <li class="sidebar-item">
              <a class="sidebar-link" href="violations.php" aria-expanded="false">
                <span>
                <i class="bi bi-send-exclamation-fill"></i>
                </span>
                <span class="hide-menu">Violations Reports
             
                </span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="violation_list.php" aria-expanded="false">
                <span>
                <i class="bi bi-list-ul"></i>
                </span>
                <span class="hide-menu">List of Violations</span>
              </a>
            </li>

        

           



          


         
       
         
            
        
          </ul>
        
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>