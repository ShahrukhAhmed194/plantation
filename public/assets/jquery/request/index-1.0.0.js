$(document).ready(function() {
    $('#gift_request_table, #new_request_table, #user_gift_list').DataTable( {
        order: [[ 0, 'desc' ]]
    } );
} );