<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{URL::to('/admin/asset/')}}/plugins/fontawesome-free/css/all.min.css" />
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{URL::to('/admin/asset/')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{URL::to('/admin/asset/')}}/dist/css/adminlte.min.css" />

        <link rel="stylesheet" href="{{URL::to('/admin/asset/')}}/lightbox.min.css" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    
        <link rel="stylesheet" href="{{URL::to('/admin/asset/')}}/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="{{URL::to('/admin/asset/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{URL::to('/admin/asset/')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
            </div>

            <!-- Model-->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mdl">

                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Navbar -->
            @include('admin.layouts.header')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin.layouts.aside')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('page-heading')</h1>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}/dashboard">Home</a></li>
                                    <li class="breadcrumb-item active">@yield('page-heading')</li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Info boxes -->
                        @yield('main-section')
                        <!-- /.row -->

                        
                        <!-- /.row -->
                    </div>
                    <!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            @include('admin.layouts.footer')
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{URL::to('/admin/asset/')}}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{URL::to('/admin/asset/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{URL::to('/admin/asset/')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{URL::to('/admin/asset/')}}/dist/js/adminlte.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{URL::to('/admin/asset/')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="{{URL::to('/admin/asset/')}}/plugins/raphael/raphael.min.js"></script>
        <script src="{{URL::to('/admin/asset/')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="{{URL::to('/admin/asset/')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="{{URL::to('/admin/asset/')}}/plugins/chart.js/Chart.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <!-- script src="{{URL::to('/admin/asset/')}}/dist/js/demo.js"></script -->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{URL::to('/admin/asset/')}}/dist/js/pages/dashboard2.js"></script>
        <script src="{{URL::to('/admin/asset/')}}/lightbox-plus-jquery.min.js"></script>

        
        <script src="{{URL::to('/admin/asset/')}}/plugins/select2/js/select2.full.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

        <script>

            $(function(){
                //Initialize Select2 Elements
                 $('.select2').select2()
            });

            $(document).ready( function () {
                $('#table_id').DataTable();
            } );

            $(document).ready(function(){
                // ajax requerst 
                $(document).on('change','#tempid',function(e){
                   // e.preventDefault();
                   var val = $(this).val();
                  // alert(val);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        
                        "url":'/ajax',
                        'type':'POST',
                        "dataType": "json",
                       //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        'data':{
                           // "_token": "{{ csrf_token() }}",
                            'tempid':val,
                            'action':'templateID'
                        },
                        
                        'success':function(response){
                            if(response.status==200){
                                //alert(response.msg);
                                $('#msg').html(response.msg);
                            }else{
                                alert('Somethings Went Wrong , please Try Again');
                            }
                        }
                    })  
                    
                });

                // edit buttion
                $('.edibtn').click(function(e){
                    e.preventDefault();

                    var id = $(this).data('id');
                    var type = $(this).data('type');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    //alert(CSRF_TOKEN);
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/Admin/ajax',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {
                                _token: CSRF_TOKEN,
                                "action":"editbtn",
                                "id":id,
                                "type":type
                            },
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) { 
                            $('.mdl').html(data);
                            
                            console.log(data);
                        }
                    }); 
                });
            });
        </script>
    </body>
</html>
