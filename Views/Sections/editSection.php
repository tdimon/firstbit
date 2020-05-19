<?php $section = $this->getVar('section'); ?>
<div class="data-form">
    <script src="../../webroot/js/Sections/editSection.js"></script>
    <form id="actionForm" data-id="<?php echo $section['id'] ?>">
        <label for="title">Название</label>
        <input name="title" id="title" required value="<?php echo $section['title']; ?>"/>
        <label for="description">Описание</label>
        <input name="description" id="description" value="<?php $section['description']; ?>"/>
        <div class="btn-action">
            <button class="btn-edit-section" type="button">Изменить</button>
            <button class="btn-close" type="button">Зыкрыть</button>
        </div>
    </form>
</div>