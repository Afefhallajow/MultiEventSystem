$(document).ready(function () {
   $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

   $('#attendance').on('submit', function (event) {
      event.preventDefault();
      $.ajax({
         url: $(this).attr('action'),
         beforeSend: function () {
            $('#action_button').hide();
            $('.spinner-grow').show();
         },
         method: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         dataType: "json",
         success: function (data) {
            var html = '';
            if (data.errors) {
               html = '<div class="alert alert-danger">';
               for (var count = 0; count < data.errors.length; count++) {
                  html += '<p><i class="bx bx-error font-size-16 align-middle mr-1"></i>' + data.errors[count] + '</p>';
               }
               html += '</div>';
            }
            if (data.success) {
               html = '<div class="alert alert-success"><i class="bx bx-check-double font-size-16 align-middle mr-1"></i>' + data.success +
                  '</div>';
               $('#attendance')[0].reset();
            }
            $('#form_result').html(html);
            $('#action_button').show();
            $('.spinner-grow').hide();
         }
      });
   });

   // import Excel
   $(document).on('submit', '#importExcel', function (event) {
      console.log('jooo');
      event.preventDefault();
      var btn_import = $(this).find('.import_btn');
      var btn_text = btn_import.html();

      $.ajax({
         url: $(this).attr('action'),
         method: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         beforeSend: function(){
            btn_import.html('<i class="fa fa-spinner fa-spin"></i>');
         },
         complete: function(params) {
            btn_import.html(btn_text);
         },
         success: function (data) {
            setTimeout(function(){$('#exampleModalImportExcel').modal('hide');}, 1000); 
            $('#records_table').DataTable().ajax.reload();
            $('#importExcel')[0].reset();
         },
         error: function(errors){
            console.log(errors);
            alert('Some thing went wrong!');
         }
      });
   });
});
