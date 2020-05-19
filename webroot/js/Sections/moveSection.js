$(function () {
    $('.btn-move-section').on('click', function () {
        if ($('.active-row.sections.active-move').length == 0) {
            alert('Не выбрано ни одного раздела');
            return;
        }

        let currentId = $('.window-select').data('id');
        let selectID = $('.active-row.sections.active-move').data('id');

        let currentLevel = $('.window-select').data('level');
        let selectLevel = $('.active-row.sections.active-move').data('level');

        if (currentId == selectID) {
            alert('Нельзя переместить раздел сам в себя');
            return;
        }

        if (currentLevel < selectLevel) {
            alert('Нельзя переместить раздел в подчиненный');
            return;
        }

        $.ajax({
            url:  'sections/moveSectionAndSave',
            type: 'POST',
            data: 'currentId=' + currentId + '&selectId=' + selectID,
            success: function () {
                $('.substrate').addClass('hidden');
                $('.data-form').remove();
                loadSections();
            }
        });
    });
});