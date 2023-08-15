function print_errors(msgs) {
    $.each( msgs, function( key, value ) {
        $('#'+key).addClass('border-danger')
        $('#'+key).after('<small class="error text-danger">'+value+'</small>')
    });

    var error_lst = '';
    $.each( msgs, function( key, value ) {
        error_lst += '<i data-feather="info" class="mr-50 align-middle"></i><span>'+value+'</spn><br/>';
    });

    return error_lst;
}

function ResultAlert(msg) {
    if(msg == 'Forbidden') msg = $('#Forbidden').attr('translation');
    html = '<div class="alert alert-danger mt-1 alert-validation-msg" role="alert"><div class="alert-body">'+msg+'</div></div>';
    slideUp();
    return html;
}

function fadeInResult(div, result) {
    $(div).html(result);
    $(div).fadeIn(1000);
    setTimeout(function(){ $(div).fadeOut(500); }, 4000);
}

function ResultErrors(errors) {
    html = '<div class="alert alert-danger">';
    for (var count = 0; count < errors.length; count++) {
        html += '<p>' + errors[count] + '</p>';
    }
    html += '</div>';
    slideUp();
    return html;
}
function ResultSuccess(msg) {
    html = '<div class="alert alert-success"> <i class="bx bx-check-double font-size-16 align-middle mr-1"></i>' + msg + '</div>';
    slideUp();
    return html;
}

function slideUp(){
    $("html, body").animate({ scrollTop: 0 }, "slow");
}

function ClearAlert(){
    $('.form-control').removeClass('border-danger');
    $('.error').remove();
    $('#form_result').html('');
    $('#form_result_chair').html('');
    $('#action_button').show();
    $('.spinner-grow').hide();
    $('#action_spinner').hide();
    $('#action_button_chair').show();
    $('#action_spinner_chair').hide();
}

function FormReset() {
    ClearAlert()

    $(':input')
        .not(':button, :submit, :reset, :checkbox, :radio')
        .val('')
        .prop('checked', false)
        // .prop('selected', false);

    if ( $( ":input:checkbox" ).length ) {
        $(':input:checkbox').prop('checked', false);
    }
    if ( $( ":input:radio" ).length ) {
        $(':input:radio').prop('checked', false);
    }
    
    $('.custome_blue_radio label').removeClass('active');
    $('.for_radio_1').addClass('active');
    $('.input_radio_1').prop('checked', true);

    $('#invitation_type').val("invited");
    $('#source').val("internal");
    $('#sent').val(1);
}
