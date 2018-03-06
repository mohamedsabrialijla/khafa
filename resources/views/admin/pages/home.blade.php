@extends('admin.layout.admin')
@section('title')
    {{"Pages"}}
@endsection
@section('page-style')
    <!-- Select2 -->
    {{--<link rel="stylesheet" href="{{url('/admin_assets/plugins/select2/select2.min.css')}}">--}}
    <!-- DataTables -->
    {{--<link rel="stylesheet" href="{{url('/admin_assets/plugins/datatables/dataTables.bootstrap.css')}}">--}}
@endsection
@section('content-header')
    <h1>
        {{"Pages"}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pages</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Show All Pages</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 space20">
                            <a href="{{url(app()->getLocale().'/admin/pages/create')}}"
                               class="btn btn-primary add-row">
                                <i class="fa fa-plus"></i>{{ " Add New" }}
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Views</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pages as $page)
                            <tr id="page-{{$page->id}}">
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->views}}</td>
                                <td>
                                    {{(strlen($page->description) < 100) ? $page->description : mb_substr(strip_tags($page->description), 0, 100 - 3, 'utf-8') . '...'}}
                                </td>
                                <td>
                                    <a href="{{url(app()->getLocale().'/admin/pages/'.$page->id.'/edit')}}"
                                       class="btn btn-primary" title="Edit">
                                        <i class="fa fa-pencil"></i> <strong>Edit</strong>
                                    </a>
                                    <a href="{{url('#')}}" onclick="delete_page('{{$page->id}}',event)"
                                       class="btn btn-danger" title="delete">
                                        <i class="fa fa-times fa fa-white"></i> <strong>Delete</strong>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">{{"No pages"}}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-plugins')
    {{--<script src="{{url('/admin_assets/plugins/select2/select2.full.min.js')}}"></script>--}}
    {{--<!-- DataTables -->--}}
    {{--<script src="{{url('/admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{url('/admin_assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>--}}
    {{--<!-- SlimScroll -->--}}
    {{--<script src="{{url('/admin_assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>--}}
    {{--<!-- FastClick -->--}}
    {{--<script src="{{url('/admin_assets/plugins/fastclick/fastclick.js')}}"></script>--}}
@endsection
@section('page-script')
    <!-- page script -->
    <script>
        function delete_page(id, e) {
            e.preventDefault();
            var r = confirm("You are about to delete this page?");
            if (r === true) {
                var url = '{{url("/en/admin/pages")}}/' + id;
                var csrf_token = '{{csrf_token()}}';
                $.ajax({
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': csrf_token},
                    url: url,
                    data: {_token: csrf_token},
                    success: function (response) {
                        if (response === 'success') {
                            $('#page-' + id).hide(1000);
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
