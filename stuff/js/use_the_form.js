function addCategory() {
    $.blockUI( {
        message: $('#add_category_form'),
        css: { display: 'block'}
    });
}

function submitCategory() {
    if ($('#category_to_add').val().indexOf('&') > -1) {
        alert("Please do not use an ampersand; it may interfere with the code.");
        return false;
    } else {
        $.post('addacategory', { category: $('#category_to_add').val() }, function(data) {
            if (data.success) {
                alert('Thank you. "' + $('#category_to_add').val() + '" has been added.');
                $.unblockUI();
                $('#category_to_add').val('');
                location.reload();
                return true;
            }
            else {
                alert(data.error);
                $.unblockUI();
                $('#category_to_add').val('');
                return false;
            }
        }, 'json');
    }
}

function addMorePictures() {
    if (pixCount === 19) {
        alert("Cannot add more pictures");
    } else {
        pixCount++;
        $('#more_pix'+pixCount).removeClass('morePix');
    }
}