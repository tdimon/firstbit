<?php
$tree = $this->getVar('tree');
if (!empty($moveSection) || !empty($moveElement)) {
    $class = 'active-row sections active-move';
}
else {
    $class = 'active-row sections';
}

function printTree($tree, $level, $class)
{
    foreach ($tree as $branch) {
        for ($i = 0; $i <= $level * 2; $i++) {
            echo '<div class="dash">--</div>';
        }
        ?>
        <table class="table-section">
            <?php
            if ($level == 0) {
            ?>
            <tr data-id="<?php echo $branch['id'] ?>" class="<?php echo $class; ?>" data-main data-level="<?php echo $level; ?>">
                <td>
                    <?php echo $branch['title']; ?>
                </td>
                <?php
                }
                else {
                ?>
            <tr data-id="<?php echo $branch['id'] ?>" data-level="<?php echo $level; ?>">
                <td>
                    <?php echo $branch['title']; ?>
                </td>
                <td>
                    <?php echo $branch['updated']; ?>
                </td>
                <td>
                    <?php echo $branch['description']; ?>
                </td>
                <?php
                }
                ?>
            </tr>
        </table>
        <?php
        printTree($branch['children'], $level + 1, $class);
    }
}

printTree($tree, 0, $class);
?>