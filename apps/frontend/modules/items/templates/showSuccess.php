<table>
  <tbody>
    <tr>
      <th>Item:</th>
      <td><?php echo $item->getItemId() ?></td>
    </tr>
    <tr>
      <th>Submitter:</th>
      <td><?php echo $item->getSubmitterId() ?></td>
    </tr>
    <tr>
      <th>In archive:</th>
      <td><?php echo $item->getInArchive() ?></td>
    </tr>
    <tr>
      <th>Withdrawn:</th>
      <td><?php echo $item->getWithdrawn() ?></td>
    </tr>
    <tr>
      <th>Owning collection:</th>
      <td><?php echo $item->getOwningCollection() ?></td>
    </tr>
    <tr>
      <th>Last modified:</th>
      <td><?php //echo $item->getLastModified() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('items/edit?item_id='.$item->getItemId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('items/index') ?>">List</a>
