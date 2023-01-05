<?php

/**
 * @var string $name
 */

?>
<form action="load-<?= $name ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="csv">CVS</label>
        <input type="file" name="csv" id="csv">
    </div>
    <button type="submit">Load</button>
</form>