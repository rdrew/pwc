<?php

/**
 * @file
 * islandora-basic-collection.tpl.php
 *
 * @TODO: needs documentation about file and variables
 */
?>

<div class="islandora islandora-basic-collection">
  <div class="islandora-basic-collection-grid clearfix">
  <?php foreach($associated_objects_array as $key => $value): ?>
<?php
  $_title = $value['title'];
  $_date = str_split($_title, 13);
?>
    <dl class="islandora-basic-collection-object <?php print $value['class']; ?>">
        <dt class="islandora-basic-collection-thumb"><?php print $value['thumb_link']; ?></dt>
        <dd class="islandora-basic-collection-caption"><a href="<?php print $value['path']; ?>"><?php print $_date[1]; ?></a></dd>
    </dl>
  <?php endforeach; ?>
</div>
</div>
