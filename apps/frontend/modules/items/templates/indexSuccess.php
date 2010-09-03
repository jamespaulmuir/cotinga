<h1>Items List</h1>

<table>
  <thead>
    <tr>
      <th>Item</th>
      <th>Submitter</th>
      <th>In archive</th>
      <th>Withdrawn</th>
      <th>Owning collection</th>
      <th>Last modified</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $item): ?>
    <tr>
      <td><a href="<?php echo url_for('items/show?item_id='.$item->getItemId()) ?>"><?php echo $item->getItemId() ?></a></td>
      <td><?php echo $item->getSubmitterId() ?></td>
      <td><?php echo $item->getInArchive() ?></td>
      <td><?php echo $item->getWithdrawn() ?></td>
      <td><?php echo $item->getOwningCollection() ?></td>
      <td><?php //echo $item->getLastModified() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
