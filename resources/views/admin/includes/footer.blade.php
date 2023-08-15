<!-- FOOTER -->
@if(\Route::currentRouteName() != 'register.success')
<footer class="footer">
   <div class="container-fluid">
      <div class="row text-center">
         <div class="col-sm-12">
            <script> document.write(new Date().getFullYear()) </script> ©
            جميع الحقوق محفوظة

         </div>
      </div>
   </div>
</footer>
@endif

<!-- JAVASCRIPT -->
<script src="{{ asset('admin') }}/libs/jquery/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script src="{{ asset('admin') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin') }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('admin') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('admin') }}/libs/node-waves/waves.min.js"></script>


<!-- Required datatable js -->
<script src="{{ asset('admin') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ asset('admin') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('admin') }}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('admin') }}/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('admin') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('admin') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Colorpicker -->
<script src="{{ asset('admin') }}/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{ asset('admin') }}/libs/select2/js/select2.min.js"></script>

<!-- Datepicker -->
<script src="{{ asset('admin') }}/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('admin') }}/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>

<script src="{{ asset('admin') }}/js/pages/form-advanced.init.js"></script>

<!-- twitter-bootstrap-wizard js -->
<script src="{{ asset('admin') }}/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="{{ asset('admin') }}/libs/twitter-bootstrap-wizard/prettify.js"></script>
<!-- form wizard init -->
<script src="{{ asset('admin') }}/js/pages/form-wizard.init.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('admin') }}/js/pages/datatables.init.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
</script>

<!-- App js -->
<script src="{{ asset('admin') }}/js/app.js"></script>
<script src="{{ asset('admin') }}/js/script.js"></script>
@stack('AJAX')
<script>
    $.extend( true, $.fn.dataTable.defaults, {
        language: {
            "emptyTable": "{{ __('dashboard.emptyTable') }}",
            "loadingRecords": "{{ __('dashboard.loadingRecords') }}",
            "processing": "{{ __('dashboard.processing') }}",
            "lengthMenu": "{{ __('dashboard.lengthMenu') }}",
            "zeroRecords": "{{ __('dashboard.zeroRecords') }}",
            "info": "{{ __('dashboard.info') }}",
            "infoEmpty": "{{ __('dashboard.infoEmpty') }}",
            "infoFiltered": "{{ __('dashboard.infoFiltered') }}",
            "search": "{{ __('dashboard.search') }}",
            "buttons": {
                "print": "طباعة",
                "excel": "اكسل",

                "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
            },

            "paginate": {
                "first": "{{ __('dashboard.first') }}",
                "previous": "{{ __('dashboard.previous') }}",
                "next": "{{ __('dashboard.next') }}",
                "last": "{{ __('dashboard.last') }}"
            },
            "aria": {
                "sortAscending": "{{ __('dashboard.sortAscending') }}",
                "sortDescending": "{{ __('dashboard.sortDescending') }}"
            }
        },
    });
</script>

