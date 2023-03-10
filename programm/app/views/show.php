<?php 

/**
 * @var string $name
 * @var array $columns
 * @var array $rows
 */

?>

<table>
    <tr>
        <?php foreach ($columns as $column) : ?>
            <th><?= $column ?></th>
        <?php endforeach; ?>    
    </tr>
    <?php foreach ($rows as $row) : ?>
        <tr>
            <?php foreach ($row as $data) : ?>
                <td><?= $data ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
<a href="download-<?= $name ?>">Download</a>