<?php $id = $this->getVar('id'); ?>
<?php $moveElement = true; ?>
<div class="data-form">
    <script src="../../webroot/js/Elements/moveElement.js"></script>
    <form id="actionForm">
        <div class="window-element" data-id="<?php echo $id ?>">
            <?php require_once 'Views/Main/getSections.php' ?>
        </div>
        <div class="btn-action">
            <button class="btn-move-element" type="button">Отправить элемент</button>
            <button class="btn-close" type="button">Зыкрыть</button>
        </div>
    </form>
</div>