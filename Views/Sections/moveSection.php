<?php $id = $this->getVar('id'); ?>
<?php $level = $this->getVar('level'); ?>
<?php $moveSection = true; ?>
<div class="data-form">
    <script src="../../webroot/js/Sections/moveSection.js"></script>
    <form id="actionForm">
        <div class="window-select" data-id="<?php echo $id ?>" data-level="<?php echo $level; ?>">
            <?php require_once 'Views/Main/getSections.php' ?>
        </div>
        <div class="btn-action">
            <button class="btn-move-section" type="button">Отправить раздел</button>
            <button class="btn-close" type="button">Зыкрыть</button>
        </div>
    </form>
</div>