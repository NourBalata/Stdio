@include('dashbord.layouts.head')
@include('dashbord.layouts.nav')

@include('dashbord.layouts.saide')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>DataTables</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">DataTables</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">

    <div class="doctor-search-blk">
                                        <div class="add-group">
                                            <a href="#" data-bs-toggle="modal"
                                               data-bs-target="#add_team"
                                               class=" modal-effect btn btn-primary add-pluss ms-2"><img
                                                    src="{{asset('dashboard/assets/img/icons/plus.svg')}}" alt=""> Add Teams</a>


                                        </div>
                                    </div>


<div class="card">
<div class="card-header">
<h3 class="card-title">Teams</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>

<th>Email</th>


<th>Action</th>
</tr>
</thead>
<tbody>
    @foreach($data as $info)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="profile-image">{{ $info->name}}
                                    </td>
                                    <td>
                                        <span class="custom-badge status-blue ">{{$info->email}}</span>

                                    </td>
            


                              
                                  <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle"
                                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit_category" data-user_id="{{$info->id}}"
                                                   data-name="{{$info->name}}" data-email="{{$info->email}}"
                                                   data-password="{{$info->password}}"
                                                ><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>

                                                <a class="dropdown-item" data-user_id="{{$info->id}}" href="#"
                                                   data-bs-toggle="modal" data-bs-target="#delete_team"><i
                                                        class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
</tbody>
<tfoot>
<tr>
    <th>#</th>
<th>Name</th>
<th>Status</th>
                          
 <th>Action</th>
</tr>
</tfoot>
</table>
</div>

</div>

</div>

</div>

</div>

</section>

</div>

<footer class="main-footer">
<div class="float-right d-none d-sm-block">
<b>Version</b> 3.2.0
</div>
<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>
<div class="modal custom-modal fade invoices-preview" id="edit_category" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_product">Edit Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card invoice-info-card">
                                <div class="card-body pb-0">
                                    <div class="modal-body">
                                        <form action="{{route('users.update','edit')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <input type="hidden" name="user_id"
                                                   class="form-control" id="id">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="name" required value="{{old('name')}}"
                                                       class="form-control" id="name">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>


        
                              

                                           
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">email: <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="email" required value="{{old('email')}}"
                                                       class="form-control" type="text"
                                                     
                                                       id="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                          

                                           
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">password: <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="password" required value="{{old('password')}}"
                                                       class="form-control" type="text"
                                                     
                                                       id="password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                          
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    delete_service--}}
    <div class="modal custom-modal modal-bg fade" id="delete_team" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Product</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{route('users.destroy','delete')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="user_id" value="" name="user_id">
                                    <a onclick="parentNode.submit();"
                                       class="btn btn-primary paid-continue-btn">Delete</a>

                                </form>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal"
                                   class="btn btn-primary paid-cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 <div class="modal custom-modal fade invoices-preview" id="add_team" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_category">New Users</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card invoice-info-card">
                                <div class="card-body pb-0">
                                    <div class="modal-body">
                                        <form action="{{route('users.store')}}" method="post"
                                              enctype="multipart/form-data" id="storedata">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">title:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="name" required value="{{old('name')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>


                                           

                                   
                                                

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="email" required value="{{old('email')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Password:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="password" required value="{{old('password')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                       

                                     
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div> 
<script src="{{asset('vendors/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('vendors/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('vendors/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{asset('vendors/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="{{asset('vendors/dist/js/demo.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<script src="{{asset('dashboard/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('dashboard/assets/js/feather.min.js')}}"></script>

<script src="{{asset('dashboard/assets/js/jquery.slimscroll.js')}}"></script>

<script src="{{asset('dashboard/assets/js/select2.min.js')}}"></script>
<script src="{{asset('dashboard/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('dashboard/assets/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('dashboard/assets/js/jquery.counterup.min.js')}}"></script>

<script src="{{asset('dashboard/assets/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('dashboard/assets/plugins/apexchart/chart-data.js')}}"></script>


<script src="{{asset('dashboard/assets/js/app.js')}}"></script>

    <script>
        // Model Delete
        $('#delete_team').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
        })
    </script>

    <script>
        // Model Edit
        $('#edit_category').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('user_id')
            var name = button.data('name')
          
            var email = button.data('email')
            var password = button.data('password')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
       
          
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #password').val(password);


           

        })
    </script>


    <script>
 	   var config = {
                  routes: {
                    store: "{!! route('users.store') !!}",
        }
    };
    $(document).on('submit', '#storedata', function(e) {
        e.preventDefault();

        $.ajax({
            url: config.routes.store,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            
            success: function(response) {
                
                alert('Save Data For Team!');
                $('#message').appaned('True!!!!');
                // new FormData('#message').html(response.message);
                if (response.status == true) {

                    console.log(response.data);                                   
               }
            },

        });


    });
</script>

  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

  
</body>
</html>
