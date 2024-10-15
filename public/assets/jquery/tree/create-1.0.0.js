function showDistrictsOfADivision(division)
{
    var district_select = $("#district");
    let district_list = [];

    $.ajax({
        url: "/get-district-list",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        data: { division: division },
        success: function(result) {
            district_select.empty();
            let district_option = '<option value="">- Please Select -</option>';
            district_list = result;
            
            district_list.forEach(function(district) {
                district_option += `<option value="${district}">${district}</option>`;
            });

            district_select.append(district_option);
        },
    });
}
