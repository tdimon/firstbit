$(function () {
    $('.btn-move-element').on('click', function () {
        if ($('.active-row.sections.active-move').length == 0) {
            alert('Не выбрано ни одного раздела');
            return;
        }

        let currentId = $('.window-element').data('id');
        let selectID = $('.active-row.sections.active-move').data('id');

        $.ajax({
            url:  'elements/moveElementAndSave',
            type: 'POST',
            data: 'id=' + currentId + '&parentId=' + selectID,
            success: function () {
                $('.substrate').addClass('hidden');
                $('.data-form').remove();
                loadSections();
            }
        });
    });
});