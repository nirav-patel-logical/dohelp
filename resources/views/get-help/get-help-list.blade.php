<?php
/**
 * Created by PhpStorm.
 * User: vidhi_BSP
 * Date: 7/19/2019
 * Time: 3:24 PM
 */?>
@extends('includes.base')

@section('seo-tag')
    <title>Man Help Member List</title>
@endsection

@section('header-pages-include')
    <!-- DataTables -->
    <link href="{{env('APP_URL')}}public/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{env('APP_URL')}}public/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('page-title')
    <h4 class="page-title float-left">Get Help List</h4>
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">

                            <table id="post" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Fee status</th>
                                    <th>Get Help</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

@endsection
@section('footer-pages-include')
    <!-- Required datatable js -->
    <script src="{{env('APP_URL')}}public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{env('APP_URL')}}public/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{env('APP_URL')}}public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            //$('#post').DataTable();
            $('#post').DataTable({
                //"processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo route('get_help_list_post'); ?>",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        '_token': '<?php echo csrf_token(); ?>'
                    }

                },
                "columns": [
                    {"data": "id"},
                    {"data": "user_name"},
                    {"data": "user_mobile"},
                    {"data": "user_city"},
                    {"data": "fee_status"},
                    {"data": "get_help"},
                    {"data": "status"},
                    {"data": "action"}
                ]

            });
        });
    </script>
@endsection
