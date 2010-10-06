<h1>Communities</h1>
<ul class="list-detail">
    <?php foreach ($communitys as $community): ?>
<li><a href="<?php echo url_for('@community_seo?slug='.$community->getSlug().'&community_id='.$community->getCommunityId()) ?>">
        <?php echo $community->getName() ?>
    </a>
</li>

   <!--  <tr>
      <td><a href="<?php echo url_for('communities/show?community_id='.$community->getCommunityId()) ?>"><?php echo $community->getCommunityId() ?></a></td>
      <td><?php echo $community->getName() ?></td>
      <td><?php echo $community->getShortDescription() ?></td>
      <td><?php echo $community->getIntroductoryText() ?></td>
      <td><?php echo $community->getLogoBitstreamId() ?></td>
      <td><?php echo $community->getCopyrightText() ?></td>
      <td><?php echo $community->getSideBarText() ?></td>
      <td><?php echo $community->getAdmin() ?></td>
    </tr> -->
    <?php endforeach; ?>
  

</ul>