<?php $element = $this->getVar('element'); ?>
<?php $type = $element['type'] ?>
<div class="data-form">
    <script src="../../webroot/js/Elements/editElement.js"></script>
    <form id="actionForm" data-id="<?php echo $element['id'] ?>">
        <input type="hidden" name="parent_id" value="<?php echo $element['parent_id']; ?>"/>
        <label for="title">Название</label>
        <input name="title" id="title" required value="<?php echo $element['title']; ?>"/>
        <label for="description">Описание</label>
        <input name="description" id="description" value="<?php $element['description']; ?>"/>
        <label for="type">Тип</label>
        <select name="type" id="type">
            <option value="новость" <?php echo ($type == 'новость') ? 'selected' : '' ?>>новость</option>
            <option value="статья" <?php echo ($type == 'статья') ? 'selected' : '' ?>>статья</option>
            <option value="отзыв" <?php echo ($type == 'отзыв') ? 'selected' : '' ?>>отзыв</option>
            <option value="комментарий" <?php echo ($type == 'комментарий') ? 'selected' : '' ?>>комментарий</option>
        </select>
        <div class="btn-action">
            <button class="btn-edit-element" type="button">Изменить</button>
            <button class="btn-close" type="button">Зыкрыть</button>
        </div>
    </form>
</div>