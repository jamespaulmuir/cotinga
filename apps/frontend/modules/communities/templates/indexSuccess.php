<h1>Communitys List</h1>

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
    <?php foreach ($communitys as $community): ?>
    <tr>
      <td><a href="<?php echo url_for('communities/show?community_id='.$community->getCommunityId()) ?>"><?php echo $community->getCommunityId() ?></a></td>
      <td><?php echo $community->getName() ?></td>
      <td><?php echo $community->getShortDescription() ?></td>
      <td><?php echo $community->getIntroductoryText() ?></td>
      <td><?php echo $community->getLogoBitstreamId() ?></td>
      <td><?php echo $community->getCopyrightText() ?></td>
      <td><?php echo $community->getSideBarText() ?></td>
      <td><?php echo $community->getAdmin() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('communities/new') ?>">New</a>
