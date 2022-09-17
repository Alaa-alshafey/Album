<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta name="description" content="">

    <title>Test Project</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin_assets/css/main-teal.css') }}" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    @if (app()->getLocale() == 'ar')

        {{--google font--}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,600&display=swap">

        <style>
            body {
                font-family: 'cairo', 'sans-serif';
            }

            .breadcrumb-item + .breadcrumb-item {
                padding-left: .5rem;
            }

            .breadcrumb-item + .breadcrumb-item::before {
                padding-left: .5rem;
            }

            div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                margin: 2px 2px;
            }
        </style>
    @endif

    {{--jquery--}}
    <script src="{{ asset('public/admin_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/admin_assets/js/jquery-ui.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('public/admin_assets/plugins/noty/noty.css') }}">
    <script src="{{ asset('public/admin_assets/plugins/noty/noty.min.js') }}"></script>

    {{--datatable--}}
    <script type="text/javascript" src="{{ asset('public/admin_assets/plugins/jquery.dataTables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admin_assets/plugins/dataTables.bootstrap/dataTables.bootstrap.min.js') }}"></script>


    {{--magnific-popup--}}
    <link rel="stylesheet" href="{{ asset('public/admin_assets/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    {{--<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>--}}
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <link rel="stylesheet" href="{{ asset('public/admin_assets/css/custom.css')}}">

    <style>
        .loader {
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        .loader-sm {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #009688;
            width: 40px;
            height: 40px;
        }

        .loader-md {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #009688;
            width: 90px;
            height: 90px;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="app sidebar-mini">

@include('admin.inc._header')

@include('admin.inc._aside')

<main class="app-content">

    @include('admin.partials._session')

    @yield('content')

    <div class="modal fade general-modal" id="add-brand" aria-labelledby="add-brand" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>

            </div>
        </div>
    </div>

</main><!-- end of main -->

<!-- Essential javascripts for application to work-->
<script src="{{ asset('public/admin_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/js/bootstrap.min.js') }}"></script>

{{--select 2--}}
<script type="text/javascript" src="{{ asset('public/admin_assets/plugins/select2/select2.min.js') }}"></script>

<script src="{{ asset('public/admin_assets/js/main.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


{{--magnific-popup--}}
<script src="{{ asset('public/admin_assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>


{{--apex chart--}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

{{--custom--}}
<script src="{{ asset('public/admin_assets/js/custom/index.js') }}"></script>
<script src="{{ asset('public/admin_assets/js/custom/roles.js') }}"></script>

<script>
    $(document).ready(function () {

        //delete
        $(document).on('click', '.delete, #bulk-delete', function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "Confirm Delete",
                type: "alert",
                killer: true,
                buttons: [
                    Noty.button("Yes", 'btn btn-success mr-2', function () {
                        let url = that.closest('form').attr('action');
                        let data = new FormData(that.closest('form').get(0));

                        let loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i>';
                        let originalText = that.html();
                        that.html(loadingText);

                        n.close();

                        $.ajax({
                            url: url,
                            data: data,
                            method: 'post',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (response) {

                                $("#record__select-all").prop("checked", false);

                                $('.datatable').DataTable().ajax.reload();

                                new Noty({
                                    layout: 'topRight',
                                    type: 'alert',
                                    text: response,
                                    killer: true,
                                    timeout: 2000,
                                }).show();

                                that.html(originalText);
                                window.location.reload(true);

                            },

                        });//end of ajax call

                    }),

                    Noty.button("No", 'btn btn-danger mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();


        });//end of delete

    });//end of document ready


</script>

@stack('scripts')

</body>
</html>