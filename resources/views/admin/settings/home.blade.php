@extends('admin.layout.admin')
@section('title'){{"Courses"}}@endsection
@section('page-style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('content-header')
    <h1>Courses</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Courses</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Show All Courses</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline " method="get">
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="status" style="width: 100%">
                                        <option value="0" {{(isset($_GET['status'])&& $_GET['status'] ==0)?'selected':''}}>{{"Pending"}}</option>
                                        <option value="1" {{(isset($_GET['status'])&& $_GET['status'] ==1)?'selected':''}}>{{"Published"}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="category_id" style="width: 100%">
                                        <option value="0">{{"Select Category"}}</option>
                                        <?php $selected = ''?>
                                        @foreach($categories as $category)
                                            <?php
                                            if (isset($_GET['category_id']) && $_GET['category_id'] == $category->id) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            ?>
                                            <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="type_id" style="width: 100%">
                                        <option value="0">{{"Select Type"}}</option>
                                        <?php $selected = '';?>
                                        @foreach($course_types as $type)
                                            <?php
                                            if (isset($_GET['type_id']) && $_GET['type_id'] == $type->id) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            ?>
                                            <option value="{{$type->id}}" {{$selected}}>{{$type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Show</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 space20">
                            <a href="{{url(app()->getLocale().'/admin/courses/create')}}"
                               class="btn btn-primary add-row">
                                <i class="fa fa-plus"></i>{{ " Add New" }}
                            </a>
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            {{--<th>#</th>--}}
                            <th>Title</th>
                            <th>Trainer</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($courses as $course)
                            <tr id="course-{{$course->id}}">
                                <td>{{$course->title}}</td>
                                <td>{{$course->trainer->name}}</td>
                                <td>{{$course->category->name}}</td>
                                <td>{{$course->course_type->title}}</td>
                                <td>
                                    <a href="{{url(app()->getLocale().'/admin/courses/'.$course->id.'/edit')}}"
                                       class="btn btn-primary" title="Edit">
                                        <i class="fa fa-pencil"></i> <strong>Edit</strong>
                                    </a>
                                    <a href="{{url('#')}}" onclick="delete_course('{{$course->id}}',event)"
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
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        function delete_course(id, e) {
            e.preventDefault();
            var r = confirm("You are about to delete course and all related lessons");
            if (r === true) {
                var url = '{{url("/en/admin/courses")}}/' + id;
                var csrf_token = '{{csrf_token()}}';
                $.ajax({
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': csrf_token},
                    url: url,
                    data: {_token: csrf_token},
                    success: function (response) {
                        if (response === 'success') {
                            $('#course-' + id).hide(1000);
                        } else {
                            alert(response);
                        }
                    },
                    fail: function (e) {
                        alert(e);
                    }
                });
            } else {
                return false;
            }
        }
    </script>
@endsection
