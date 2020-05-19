<div class="data-form">
    <script src="../../webroot/js/Elements/addElement.js"></script>
    <form id="actionForm">
        <label for="title">Название</label>
        <input name="title" id="title" required/>
        <label for="description">Описание</label>
        <input name="description" id="description"/>
        <label for="type">Тип</label>
        <select name="type" id="type">
            <option value="новость">новость</option>
            <option value="статья">статья</option>
            <option value="отзыв">отзыв</option>
            <option value="комментарий">комментарий</option>
        </select>
        <div class="btn-action">
            <button class="btn-add-element" type="button">Добавить элемент</button>
            <button class="btn-close" type="button">Зыкрыть</button>
        </div>
    </form>
</div>