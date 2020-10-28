<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           
          <img src="{{ asset('users/'.Auth::user()->image) }}" class="img-circle" alt="Petpooja Image">
        </div>
         <div class="pull-left info">
          <p>OpenXcell Practical</p>
        </div> 
       
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       
             

         <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php $user = Auth::user(); 

               if($user->user_type_id == "1"){ ?>
            <li><a href="{{route('projects.index')}}"><i class="fa fa-circle-o"></i> Projects View</a></li>
            <li><a href="{{route('projects.create')}}"><i class="fa fa-circle-o"></i> Project Create</a></li>

          <?php } else { ?>

            <li><a href="{{route('projects.index')}}"><i class="fa fa-circle-o"></i> Projects View</a></li>
            

          <?php } ?>

          </ul>
        </li>             
    
    </section>
    <!-- /.sidebar -->
  </aside>