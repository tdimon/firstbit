$(function () {
    $('.btn-edit-section').on('click', function () {
        $('#actionForm').find('input[required]').each(function () {
            if ($(this).val() == '') {
                $(this).addClass('input-required');
                alert('Не заполнены обязательные поля');
                return;
            }
            else {
                $(this).removeClass('input-required');
            }
        });
        let dataForm = $('#actionForm').serialize();
        let $activeSection = $('.active-row.sections');
        let id = $('#actionForm').data('id');
        dataForm += '&id=' + id;
        $.ajax({
            url:  'sections/saveSection',
            type: 'POST',
            data: dataForm,
            success: function () {
                $('.substrate').addClass('hidden');
                $('.data-form').remove();
                loadSections();
            }
        });
    });
});