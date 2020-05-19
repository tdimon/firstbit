$(function () {
    let $substrate = $('.substrate');

    loadSections();

    $('body').on('click', '.btn-close', function () {
        $('.substrate').addClass('hidden');
        $('.data-form').remove();
    });

    $('#addSection').on('click', function () {
        $.ajax({
            url: 'sections/addSection',
            success: function (data) {
                $substrate.append(data);
                $substrate.removeClass('hidden');
            }
        });
    });
    $('#addElement').on('click', function () {
        $.ajax({
            url: 'elements/addElement',
            success: function (data) {
                $substrate.append(data);
                $substrate.removeClass('hidden');
            }
        });
    });

    $('#editSection').on('click', function () {
        if ($('.active-row.sections').length == 0) {
            alert('Не выбрано ни одного раздела');
            return;
        }
        if ($('.active-row.sections').attr('data-main') !== undefined) {
            alert('Нельзя редактировать корневой раздел');
            return;
        }
        $.ajax({
            url: 'sections/editSection',
            data: 'id=' + $('.active-row.sections').data('id'),
            type: 'POST',
            success: function (data) {
                $substrate.append(data);
                $substrate.removeClass('hidden');
            }
        });
    });

    $('#editElement').on('click', function () {
        if ($('.active-row.elements').length == 0) {
            alert('Не выбрано ни одного элемента');
            return;
        }

        $.ajax({
            url: 'elements/editElement',
            data: 'id=' + $('.active-row.elements').data('id'),
            type: 'POST',
            success: function (data) {
                $substrate.append(data);
                $substrate.removeClass('hidden');
            }
        });
    });

    $('#deleteSection').on('click', function () {
        if ($('.active-row.sections').length == 0) {
            alert('Не выбрано ни одного раздела');
            return;
        }

        if ($('.active-row.sections').attr('data-main') !== undefined) {
            alert('Нельзя удалить корневой раздел');
            return;
        }
        $.ajax({
            url: 'sections/deleteSection',
            data: 'id=' + $('.active-row.sections').data('id'),
            type: 'POST',
            success: function () {
                loadSections();
            }
        });
    });

    $('#deleteElement').on('click', function () {
        if ($('.active-row.elements').length == 0) {
            alert('Не выбрано ни одного элемента');
            return;
        }

        $.ajax({
            url: 'elements/deleteElement',
            data: 'id=' + $('.active-row.elements').data('id'),
            type: 'POST',
            success: function () {
                loadElements();
            }
        });
    });

    $('#moveSection').on('click', function () {
        if ($('.active-row.sections').length == 0) {
            alert('Не выбрано ни одного раздела');
            return;
        }
        if ($('.table-section tr').length == 1) {
            alert('Недостаточно разделов для переноса');
            return;
        }
        $.ajax({
            url: 'sections/moveSection',
            data: 'id=' + $('.active-row.sections').data('id') + '&level=' + $('.active-row.sections').data('level'),
            type: 'POST',
            success: function (data) {
                $substrate.append(data);
                $substrate.removeClass('hidden');
            }
        });
    });

    $('#moveElement').on('click', function () {
        if ($('.active-row.elements').length == 0) {
            alert('Не выбрано ни одного элемента');
            return;
        }

        $.ajax({
            url: 'elements/moveElement',
            data: 'id=' + $('.active-row.elements').data('id'),
            type: 'POST',
            success: function (data) {
                $substrate.append(data);
                $substrate.removeClass('hidden');
            }
        });
    });



    $('body').on('click', '.table-section tr', function () {
        if ($('.window-select').length == 0 && $('.window-element').length == 0) {
            $(this).addClass('active-row sections');
            $('.table-section tr').not(this).removeClass('active-row sections');
            loadElements();
        } else {
            $(this).addClass('active-row sections active-move');
            $('.window-select .table-section tr').not(this).removeClass('active-row sections active-move');
            $('.window-element .table-section tr').not(this).removeClass('active-row sections active-move');
        }
    });

    $('body').on('click', '.table-element tr', function () {
             $(this).addClass('active-row elements');
            $('.table-element tr').not(this).removeClass('active-row elements');
    });
});

function loadSections() {
    $.ajax({
        url: 'main/getSections',
        success: function (data) {
            $('.sections').html(data);
            loadElements();
        }
    });
}

function loadElements() {
    let parentId = $('.active-row.sections').data('id');
    $.ajax({
        url: 'main/getElements',
        type: 'POST',
        data: "parent_id=" + parentId,
        success: function (data) {
            $('.elements').html(data);
        }
    });
}