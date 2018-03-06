@extends('admin.layout.admin')
@section('title'){{"طلاب"}}@endsection
@section('page-style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('content-header')
    <h1>طلاب</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">طلاب</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">مشاهدة كافة طلاب</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline " method="get">
                                <div class="form-group col-md-4">
                                    <input type="text" value="{{old('name')}}" name="user_search" placeholder="بحث بالاسم">
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <select class="form-control" name="status" style="width: 100%">
                                        <option value="عليه">{{"عليه"}}</option>
                                        <option value="منه" >{{"منه"}}</option>
                                    </select>
                                </div> --}}
                                
                                <button type="submit" class="btn btn-primary">مشاهدة</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 space20">
                            <a href="{{url(app()->getLocale().'/admin/users/create_student')}}"
                               class="btn btn-primary add-row">
                                <i class="fa fa-plus"></i>{{ " اضافة جديد" }}
                            </a>
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            {{--<th>#</th>--}}
                            <th>الاسم</th>
                            <th>الايميل</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr id="issue-{{$user->id}}">
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{url(app()->getLocale().'/admin/users/'.$user->id.'/edit')}}"
                                       class="btn btn-primary" title="Edit">
                                        <i class="fa fa-pencil"></i> <strong>تعديل</strong>
                                    </a>
                                    <a href="{{url('#')}}" onclick="delete_user('{{$user->id}}',event)"
                                       class="btn btn-danger" title="delete">
                                        <i class="fa fa-times fa fa-white"></i> <strong>حذف</strong>
                                    </a>
                                    <a href="{{url(app()->getLocale().'/admin/users/'.$user->id.'/edit_password')}}"
                                       class="btn btn-primary" title="تعديل">
                                        <i class="fa fa-pencil"></i> <strong>تعديل/المرور </strong>
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
       

        function delete_user(id, e) {
            e.preventDefault();
            swal({
                title: "حذف مستخدم!",
                text: "انت على وشك حذف المستخدم",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willDelete)=>{
                if (willDelete) {
                    var url = '{{url("/en/admin/users")}}/' + id;
                    var csrf_token = '{{csrf_token()}}';
                    $.ajax({
                        type: 'delete',
                        headers: {'X-CSRF-TOKEN': csrf_token},
                        url: url,
                        data: {_method:'destroy'},
                        success: function (response) {
                            console.log(response);
                            if (response === 'success') {
                                $('#issue-' + id).hide(1000);
                                swal("تم حذف المستخدم!", {icon: "success"});
                            } else {
                                swal('Error', {icon: "error"});
                            }
                        },
                        error: function (e) {
                            swal('exception', {icon: "error"});
                        }
                    });
                } else {
                    swal("عملية الحذف الغيت!");
                }
            });
          
        }
    </script>
@endsection
