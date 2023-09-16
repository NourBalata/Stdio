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
                                               data-bs-target="#add_product"
                                               class=" modal-effect btn btn-primary add-pluss ms-2"><img
                                                    src="{{asset('dashboard/assets/img/icons/plus.svg')}}" alt=""> Add Abouts</a>


                                        </div>
                                    </div>


<div class="card">
<div class="card-header">
<h3 class="card-title">Abouts</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>#</th>
    <th>Title</th>


<th>Year</th>
<th>Summary</th>

<th>Action</th>
</tr>
</thead>
<tbody>
    @foreach($data as $info)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="profile-image"><a href="#"><img width="28" height="28"
                                                                               src="{{ $info->image !='' ? $info->image :asset('dashboard/assets/img/profiles/avatar-02.jpg')}}"
                                                                               class="rounded-circle m-r-5"
                                                                               alt="">{{ $info->title}}</a>
                                    </td>
                                    <td>
                                        <span class="custom-badge status-blue ">{{$info->year}}</span>

                                    </td>
                                  <td>
                                        <span class="custom-badge status-blue ">{{$info->summary}}</span>

                                    </td> 
                                  

                                  

                              
                                  <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle"
                                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit_product" data-about_id="{{$info->id}}"
                                                   data-title="{{$info->title}}" data-note="{{$info->note}}"
                                                    data-image="{{$info->image}}"
                                                   data-price="{{$info->price}}"
                                                   data-status="{{$info->status}}"><i
                                                        class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>

                                                <a class="dropdown-item" data-about_id="{{$info->id}}" href="#"
                                                   data-bs-toggle="modal" data-bs-target="#delete_product"><i
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
<div class="modal custom-modal fade invoices-preview" id="edit_product" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_category">Edit Product</h5>
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
                                        <form action="{{route('abouts.update','edit')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <input type="hidden" name="about_id"
                                                   class="form-control" id="id">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Title:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="title" required value="{{old('title')}}"
                                                       class="form-control" id="title">

                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">year: <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="year" required value="{{old('year')}}"
                                                       class="form-control" type="text"
                                                     
                                                       id="year">

                                                @error('year')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                              

                                           
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">summary: <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="summary" required value="{{old('summary')}}"
                                                       class="form-control" type="text"
                                                     
                                                       id="summary">

                                                @error('summary')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                          

                                       
                                            <div class="col-6">
                                                <div class="form-group local-top-form">
                                                    <label class="local-top">Image <span
                                                            class="login-danger">*</span></label>
                                                    <div class="settings-btn upload-files-avator">
                                                        <input type="file" accept="image/*" name="image" id="file2"
                                                               onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])"

                                                               class="hide-input">

                                                    </div>


                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                          </span>

                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="upload-images form-group local-top-form">
                                                    <img id="pic" width="150px" height="150px"
                                                         src=""
                                                         alt="Image">
                                                    {{--                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">--}}
                                                    {{--                                        <i class="feather-x-circle"></i>--}}
                                                    {{--                                    </a>--}}
                                                </div>
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
    <div class="modal custom-modal modal-bg fade" id="delete_product" role="dialog">
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
                                <form action="{{route('abouts.destroy','delete')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="about_id" value="" name="about_id">
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
    <div class="modal custom-modal fade invoices-preview" id="add_product" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_category">New Product</h5>
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
                                        <form action="{{route('abouts.store')}}" method="post"
                                              enctype="multipart/form-data" id="storedata">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">title:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="title" required value="{{old('title')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>


                                       
 

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">year:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="year" required value="{{old('year')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('year')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>

                                   
                                                

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">summary:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="summary" required value="{{old('summary')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('summary')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>

            
                                            <div class="col-6">
                                                <div class="form-group local-top-form">
                                                    <label class="local-top">Image <span
                                                            class="login-danger">*</span></label>
                                                    <div class="settings-btn upload-files-avator">
                                                        <input type="file" accept="image/*" name="image" id="file22"
                                                               onchange="document.getElementById('upload').src = window.URL.createObjectURL(this.files[0])"
                                                               class="hide-input">

                                                    </div>


                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                          </span>

                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="upload-images form-group local-top-form">
                                                    <img id="upload" width="150px" height="150px"
                                                         src="{{asset('dashboard/assets/img/1691151957621.jpg')}}"
                                                         alt="Image">
                                                    {{--                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">--}}
                                                    {{--                                        <i class="feather-x-circle"></i>--}}
                                                    {{--                                    </a>--}}
                                                </div>
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
        $('#delete_product').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var about_id = button.data('about_id')
            var modal = $(this)
            modal.find('.modal-body #about_id').val(about_id);
        })
    </script>

    <script>
        // Model Edit
        $('#edit_product').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('about_id')
            var title = button.data('title')
            
            var year = button.data('year')
            var summary = button.data('summary')
            var image = button.data('image')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
       
            modal.find('.modal-body #year').val(year);
            modal.find('.modal-body #summary').val(summary);
            modal.find('.modal-body #pic').attr("src", image);


           

        })
    </script>


    <script>
 	   var config = {
                  routes: {
                    store: "{!! route('abouts.store') !!}",
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
                
                alert('Save Data For Abouts');
                $('#message').appaned('True!!!!');
                // new FormData('#message').html(response.message);
                if (response.status == true) {

                    console.log(response.data);                                   
               }
            },

        });


    });

</script>
  
  
 

  
</body>
</html>
