<h1>Public community items List</h1>

<table>
  <thead>
    <tr>
      <th>Community</th>
      <th>Name</th>
      <th>Short description</th>
      <th>Introductory text</th>
      <th>Logo bitstream</th>
      <th>Copyright text</th>
      <th>Side bar text</th>
      <th>Admin</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($public_community_items as $public_community_item): ?>
    <tr>
      <td><a href="<?php echo url_for('communities/show?community_id='.$public_community_item->getCommunityId()) ?>"><?php echo $public_community_item->getCommunityId() ?></a></td>
      <td><?php echo $public_community_item->getName() ?></td>
      <td><?php echo $public_community_item->getShortDescription() ?></td>
      <td><?php echo $public_community_item->getIntroductoryText() ?></td>
      <td><?php echo $public_community_item->getLogoBitstreamId() ?></td>
      <td><?php echo $public_community_item->getCopyrightText() ?></td>
      <td><?php echo $public_community_item->getSideBarText() ?></td>
      <td><?php echo $public_community_item->getAdmin() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('communities/new') ?>">New</a>
