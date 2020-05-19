$(function () {
    $('.btn-add-element').on('click', function () {
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
        if ($activeSection.length > 0) {
            let parentId = $activeSection.data('id');
            dataForm += '&parent_id=' + parentId;
        }
        $.ajax({
            url:  'elements/saveElement',
            type: 'POST',
            data: dataForm,
            success: function () {
                $('.substrate').addClass('hidden');
                $('.data-form').remove();
                loadElements();
            }
        });
    });
});