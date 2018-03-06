@extends('admin.layout.admin')
@section('title'){{"FQA"}}@endsection
@section('page-style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('content-header')
    <h1>FQA</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">FQA</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ALL FQA</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-12 space20">
                            <a href="{{url(app()->getLocale().'/admin/helps/create')}}"
                               class="btn btn-primary add-row">
                                <i class="fa fa-plus"></i>{{ "Add New" }}
                            </a>
                        </div>
                    </div>
                    <hr>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            {{--<th>#</th>--}}
                            <th>Question_ar</th>
                            <th>Answer_ar</th>
                            <th>Question_en</th>
                            <th>Answer_en</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($helps as $help)
                            <tr id="help-{{$help->id}}">
                                
                                 @foreach($locales as $locale)
                                 <td>{{$help->translate($locale->lang)->question}}</td>
                                <td>{{$help->translate($locale->lang)->answer}}</td>
                                @endforeach
                                <td>
                                    <a href="{{url(app()->getLocale().'/admin/helps/'.$help->id.'/edit')}}"
                                       class="btn btn-primary" title="Edit">
                                        <i class="fa fa-pencil"></i> <strong>Edit</strong>
                                    </a>
                                    <a href="{{url('#')}}" onclick="delete_help('{{$help->id}}',event)"
                                       class="btn btn-danger" title="delete">
                                        <i class="fa fa-times fa fa-white"></i> <strong>Delete</strong>
                                    </a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@section('js-plugins')
    <!-- DataTables -->
    <script src="{{url('/admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/admin_assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{url('/admin_assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('/admin_assets/plugins/fastclick/fastclick.js')}}"></script>
@endsection
@section('page-script')
    <!-- page script -->
    <script>
        $(function () {
            //$("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });

        function delete_help(id, e) {
            e.preventDefault();
            swal({
                title: "Delete help",
                text: "Are you sure delete help",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willDelete)=>{
                if (willDelete) {
                    var url = '{{url("/en/admin/helps")}}/' + id;
                    var csrf_token = '{{csrf_token()}}';
                    $.ajax({
                        type: 'delete',
                        headers: {'X-CSRF-TOKEN': csrf_token},
                        url: url,
                        data: {_method:'destroy'},
                        success: function (response) {
                            console.log(response);
                            if (response === 'success') {
                                $('#help-' + id).hide(1000);
                                swal("help Deleted", {icon: "success"});
                            } else {
                                swal('Error', {icon: "error"});
                            }
                        },
                        error: function (e) {
                            swal('exception', {icon: "error"});
                        }
                    });
                } else {
                    swal("Cancle Delete");
                }
            });
          
        }
    </script>
@endsection
