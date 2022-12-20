<aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{URL::to('/')}}/dashboard" class="brand-link">
                    <img src="{{URL::to('/admin/asset/')}}/dist/img/avatar5.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">Welcome {{session('username')}}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                   

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="{{URL::to('/Admin/dashboard')}}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                      
                                    </p>
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-cloud"></i>
                                    <p>
                                        Company Information
                                        <i class="fas fa-angle-left right"></i>
                                        
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/Addinfo')}}" class="nav-link">
                                           <i class="fas fa-info-circle"></i> 
                                            <p>Add Info</p>
                                        </a>
                                    </li>                                    
                                </ul>                                
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                  <i class="fas fa-sliders-h"></i>
                                    <p>
                                        Slider
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/slider')}}" class="nav-link">
                                        <i class="fab fa-slideshare"></i>
                                            <p>Add Sliders</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-microchip"></i>
                                    <p>
                                        Add Technology
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/service')}}" class="nav-link">
                                        <i class="fas fa-microchip"></i>
                                            <p>Add service</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-seedling"></i>
                                    <p>
                                        Create Plans
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/Plans')}}" class="nav-link">
                                        <i class="fab fa-unsplash"></i>
                                            <p>Add Plans</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/FPlans')}}" class="nav-link">
                                        <i class="fas fa-globe-americas"></i>
                                            <p>Add Plans features</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-question"></i>
                                    <p>
                                        Faq
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/Faq')}}" class="nav-link">
                                        <i class="fab fa-acquisitions-incorporated"></i>
                                            <p>Add Questions</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-comment-dots"></i>
                                    <p>
                                         Testimonials
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/Testimonials')}}" class="nav-link">
                                        <i class="fas fa-comment-medical"></i>
                                            <p>Add Testimonials</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fab fa-teamspeak"></i>
                                    <p>
                                         Add Team Member
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/team')}}" class="nav-link">
                                        <i class="fas fa-user-plus"></i>
                                            <p>Add Member's</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fab fa-teamspeak"></i>
                                    <p>
                                         View Messages
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{URL::to('/Admin/message')}}" class="nav-link">
                                        <i class="fas fa-user-plus"></i>
                                            <p>View Incoming Request</p>
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