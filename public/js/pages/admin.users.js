$(document).on('click', '[data-action="editUser"]', function() {
    var elInfoContainer = $(this).parents('.user-info-container');
    elInfoContainer.find('.user-info-editable').hide();
    elInfoContainer.find('.user-info-edit').show();

    $(this).hide();
    elInfoContainer.find('[data-action="cancelEditUser"]').show();
});

$(document).on('click', '[data-action="cancelEditUser"]', function() {
    var elInfoContainer = $(this).parents('.user-info-container');

    elInfoContainer.find('.user-info-editable').show();
    elInfoContainer.find('.user-info-edit').hide();

    $(this).hide();
    elInfoContainer.find('[data-action="editUser"]').show();
});
$(document).on('submit', '.user-info-container form', function (e) {
    var elContainer = $(this).parents('.user-info-container');
    $(this).ajaxSubmit(function (data) {
        $(elContainer).replaceWith(data);
    });
    return false;
});