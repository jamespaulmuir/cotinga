<table>
  <tbody>
    <tr>
      <th>Community:</th>
      <td><?php echo $community->getCommunityId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $community->getName() ?></td>
    </tr>
    <tr>
      <th>Short description:</th>
      <td><?php echo $community->getShortDescription() ?></td>
    </tr>
    <tr>
      <th>Introductory text:</th>
      <td><?php echo $community->getIntroductoryText() ?></td>
    </tr>
    <tr>
      <th>Logo bitstream:</th>
      <td><?php echo $community->getLogoBitstreamId() ?></td>
    </tr>
    <tr>
      <th>Copyright text:</th>
      <td><?php echo $community->getCopyrightText() ?></td>
    </tr>
    <tr>
      <th>Side bar text:</th>
      <td><?php echo $community->getSideBarText() ?></td>
    </tr>
    <tr>
      <th>Admin:</th>
      <td><?php echo $community->getAdmin() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('communities/edit?community_id='.$community->getCommunityId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('communities/index') ?>">List</a>
