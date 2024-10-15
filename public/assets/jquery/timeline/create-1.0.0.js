$(document).ready(function() {
    let i = 1;
    $('.btn-success').click(function(e) {
        e.preventDefault();
        var html = `<div class="row ">
                        <div class="col-lg-5">
                            <div class="mb-4">
                                <label for="photo_date" class="form-label fw-semibold"><i class="text-danger">* </i>Plantation Date</label>
                                <input type="date" name="photo_date[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="mb-4">
                                <label for="tree_photo_path" class="form-label fw-semibold"><i class="text-danger"> * </i> Upload Image</label>
                                <input type="file" name="tree_photo_path[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-4 mt-4">
                                <button class="btn btn-danger form-control remove">Remove</button>
                            </div>
                        </div>
                    </div>`;
        $('.timeline').last().after(html);
    });

    $('body').on('click', '.remove', function(e) {
        e.preventDefault(); // Prevent the default action
        $(this).closest('.row').remove();
    });

    $('#submit_timeline').click(function(e) {
        e.preventDefault();
        if (validateForm()) {
            $('#timeline_form').submit();
        } else {
            alert('Please fill out all required fields.');
        }
    });

    function validateForm() {
        let isValid = true;
        $('#timeline_form input[type="date"]').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        $('#timeline_form input[type="file"]').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        return isValid;
    }
});