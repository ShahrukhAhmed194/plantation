$(document).ready(function() {
    let division_list = [];
    $.ajax({
        url: "/get-division-list",
        type: "GET",
        success: function (result) {
            division_list = result;
        },
    });

    $('#add_new').click(function(e) {
        e.preventDefault();

        let divisionOption = '<option value="">- Please Select -</option>';
        
        division_list.forEach(function(division) {
            divisionOption += `<option value="${division}">${division}</option>`;
        });

        var html = `<div class="row division-district">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold"><i class="text-danger">* </i>Receiver's Name</label>
                                <input type="text" name="name[]" class="form-control">
                                <span class="error-msg text-danger d-none">Please enter receiver's name</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="phone" class="form-label fw-semibold"><i class="text-danger"> * </i> Receiver's Phone</label>
                                <input type="text" name="phone[]" class="form-control">
                                <span class="error-msg text-danger d-none">Please enter receiver's phone</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="home_address" class="form-label fw-semibold"><i class="text-danger">* </i>Receiver's Home Address</label>
                                <input type="text" name="home_address[]" class="form-control">
                                <span class="error-msg text-danger d-none">Please enter receiver's home address</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="division" class="form-label fw-semibold"><i class="text-danger"> * </i> Receiver's Division</label>
                                <select name="division[]" class="form-control custom-select division-select">
                                    ${divisionOption}
                                </select>
                                <span class="error-msg text-danger d-none">Please select receiver's division</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3 has-success">
                                <label class="form-label fw-semibold"> <i class="text-danger"> * </i>Receiver's District</label>
                                <select name="district[]" class="form-control custom-select district-select">
                                </select>
                                <span class="error-msg text-danger d-none">Please select receiver's district</span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-4 mt-4">
                                <button class="btn btn-danger form-control remove">Remove</button>
                            </div>
                        </div>
                    </div>`;
        $('.tree_request').append(html);
    });

    $('.tree_request').on('click', '.remove', function() {
        $(this).closest('.row').remove();
    });

    $('#submit_tree_request').click(function(e){
        if (validateForm()) {
            $('#tree_request_form').submit();
        } else {
            alert('You forgot to fill out input field.');
        }
    });
});

function showDistrictsOfADivision(division)
{
    var district_list = [];
    $.ajax({
        url: "get-district-list",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: "post",
        data: {division : division},
        success: function (result) {
            $('#district').empty();
            district_list = result;
            
            let district_option = '<option value="">- Please Select -</option>';
            district_list.forEach(function(district) {
                district_option += `<option value="${district}">${district}</option>`;
            });

            $('#district').append(district_option);
        },
    });
}

function validateForm() {
    let isValid = true;

    $('.tree_request input, .tree_request select').each(function() {
        let errorMsg = $(this).siblings('.error-msg');
        if (!$(this).val()) {
            errorMsg.removeClass('d-none');
            isValid = false;
        } else {
            errorMsg.hide();
        }
    });

    return isValid;
}


$('.tree_request').on('change', '.division-select', function() {
    var district_select = $(this).closest('.division-district').find('.district-select');
    let division = $(this).val();
    let district_list = [];

    $.ajax({
        url: "/get-district-list",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        data: { division: division },
        success: function(result) {
            let district_option = '<option value="">- Please Select -</option>';

            district_list = result;
            district_list.forEach(function(district) {
                district_option += `<option value="${district}">${district}</option>`;
            });

            district_select.append(district_option);
        },
    });
});