<table>
  <tbody>
    <tr>
      <th>Community:</th>
      <td><?php echo $public_community_item->getCommunityId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $public_community_item->getName() ?></td>
    </tr>
    <tr>
      <th>Short description:</th>
      <td><?php echo $public_community_item->getShortDescription() ?></td>
    </tr>
    <tr>
      <th>Introductory text:</th>
      <td><?php echo $public_community_item->getIntroductoryText() ?></td>
    </tr>
    <tr>
      <th>Logo bitstream:</th>
      <td><?php echo $public_community_item->getLogoBitstreamId() ?></td>
    </tr>
    <tr>
      <th>Copyright text:</th>
      <td><?php echo $public_community_item->getCopyrightText() ?></td>
    </tr>
    <tr>
      <th>Side bar text:</th>
      <td><?php echo $public_community_item->getSideBarText() ?></td>
    </tr>
    <tr>
      <th>Admin:</th>
      <td><?php echo $public_community_item->getAdmin() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('communities/edit?community_id='.$public_community_item->getCommunityId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('communities/index') ?>">List</a>
