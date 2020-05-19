<?php
$elements = $this->getVar('elements');
?>
<?php foreach ($elements as $element): ?>
<div class="dash">--</div>
<table class="table-element">
    <tr data-id="<?php echo $element['id'] ?>">
        <td>
            <?php echo $element['title']; ?>
        </td>
        <td>
            <?php echo $element['description']; ?>
        </td>
        <td>
            <?php echo $element['type']; ?>
        </td>
    </tr>
</table>
<?php endforeach; ?>