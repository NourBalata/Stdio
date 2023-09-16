
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
    
        {{-- <div class="doctor-search-blk">
                                            <div class="add-group">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#add_portfilo"
                                                   class=" modal-effect btn btn-primary add-pluss ms-2"><img
                                                        src="{{asset('dashboard/assets/img/icons/plus.svg')}}" alt=""> Add Products</a>
    
    
                                            </div>
                                        </div> --}}
    
    
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Messages</h3>
    </div>
    
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
            
      
        <tr>
            <th>#</th>
           
            <th>Name</th>

            <th>Email</th>
  
            <th>phone</th>
            <th>Note</th>
          
        </tr>
        </thead>
        <tbody>

       @foreach($messages as $info)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td class="profile-image">{{ $info->name}}
                </td>
                <td>
                    <span class="custom-badge status-blue ">{{$info->email}}</span>

                </td>
                <td>
                    <span class="custom-badge status-blue ">{{$info->phone}}</span>

                </td> 
              <td>
                    <span class="custom-badge status-blue ">{{$info->note}}</span>

                </td> 
                 {{-- <td>
                    {{isset($info->brand->name)? $info->brand->name :''}}
                </td>  --}}

                

          
            </tr>

        @endforeach
        </tbody>
    </table>
</div>


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

    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>

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
    </script>