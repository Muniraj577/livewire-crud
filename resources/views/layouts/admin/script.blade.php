<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('admin/js/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/js/jszip.min.js') }}"></script>
<script src="{{ asset('admin/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>

<script>
    var update = function() {
        document.getElementById("display_time")
            .innerHTML = moment().format('YYYY-MM-DD h:mm a');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showImg(img, previewId) {
        readInputURL(img, previewId);
    }

    function readInputURL(input, idName) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#" + idName).attr('src', e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function dataTablePosition() {
        $('.buttons-collection').detach().appendTo('.dataTables_filter');
    }


    var today = new Date();
    var today_date = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today
        .getDate()).slice(-2);
    $(document).ready(function() {
        setInterval(update, 1000);
        $(".alert-warning").css('display', 'none');
        toastrMessage();
    });


    function deleteData($_id, $_action) {
        $.ajax({
            url: $_action,
            type: 'POST',
            data: {
                'id': $_id,
                '_method': 'DELETE'
            },
            success: function(data) {
                if (data.error) {
                    toastr.warning(data.error);
                } else if (data.db_error) {
                    toastr.warning(data.db_error);
                } else if (!data.error && !data.db_error) {
                    toastr.success(data.msg);
                    if (data.redirectRoute) {
                        location.href = data.redirectRoute;
                    }
                }

            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });
    }

    function initializeDataTable(tableId) {
        $("#" + tableId).DataTable({
            "responsive": false,
            "autoWidth": false,
            "processing": true,
            "dom": 'lBfrtip',
            "buttons": [{
                    extend: 'collection',
                    text: "<i class='fa fa-ellipsis-v'></i>",
                    buttons: [{
                            extend: 'copy',
                            exportOptions: {
                                columns: 'th:not(:last-child)'
                            }
                        },
                        {
                            extend: 'pdf',

                            exportOptions: {
                                columns: 'th:not(:last-child)'
                            }
                        },
                        {
                            extend: 'print',

                            exportOptions: {
                                columns: 'th:not(:last-child)'
                            },

                        },
                    ],

                },
                {
                    extend: 'colvis',
                    columns: ':not(.hidden)'
                }
            ],

            "language": {
                "infoEmpty": "No entries to show",
                "emptyTable": "No data available",
                "zeroRecords": "No records to display",
            }
        });
        dataTablePosition();
    }
</script>
<script>
    function toastrMessage() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-container",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }
        @endif
    }
</script>

<script>
    window.addEventListener('hide-alert-warning', (e) => {
        $(".alert-warning").css('display', 'none');
    });
    window.addEventListener('initializeDataTable', (e) => {
        initializeDataTable(e.detail.table);
        toastrMsg(e);
        
    });

    function toastrMsg(event)
    {
        toastr[event.detail[0].type](event.detail[0].message,toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-container",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });
    }
</script>
@yield('scripts')
@livewireScripts
