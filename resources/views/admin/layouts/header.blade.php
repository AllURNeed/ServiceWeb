<nav class="main-header navbar navbar-expand navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="{{URL::to('/asset/')}}/#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{URL::to('/asset/')}}/dashboard" class="nav-link">Home</a>
                    </li>
                    
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-danger" data-widget="fullscreen" href="{{URL::to('/Admin')}}/logout" role="button">
                            Logout <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </li>
                    
                </ul>
            </nav>