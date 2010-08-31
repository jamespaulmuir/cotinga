<h2><?php echo $collection->getName() ?></h2>
<!--
<table>
  <tbody>
    <tr>
      <th>Collection:</th>
      <td><?php echo $collection->getCollectionId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $collection->getName() ?></td>
    </tr>
    <tr>
      <th>Short description:</th>
      <td><?php echo $collection->getShortDescription() ?></td>
    </tr>
    <tr>
      <th>Introductory text:</th>
      <td><?php echo $collection->getIntroductoryText() ?></td>
    </tr>
    <tr>
      <th>Logo bitstream:</th>
      <td><?php echo $collection->getLogoBitstreamId() ?></td>
    </tr>
    <tr>
      <th>Template item:</th>
      <td><?php echo $collection->getTemplateItemId() ?></td>
    </tr>
    <tr>
      <th>Provenance description:</th>
      <td><?php echo $collection->getProvenanceDescription() ?></td>
    </tr>
    <tr>
      <th>License:</th>
      <td><?php echo $collection->getLicense() ?></td>
    </tr>
    <tr>
      <th>Copyright text:</th>
      <td><?php echo $collection->getCopyrightText() ?></td>
    </tr>
    <tr>
      <th>Side bar text:</th>
      <td><?php echo $collection->getSideBarText() ?></td>
    </tr>
    <tr>
      <th>Workflow step 1:</th>
      <td><?php echo $collection->getEpersongroupForWorkflowStep1() ?></td>
    </tr>
    <tr>
      <th>Workflow step 2:</th>
      <td><?php echo $collection->getEpersongroupForWorkflowStep2() ?></td>
    </tr>
    <tr>
      <th>Workflow step 3:</th>
      <td><?php echo $collection->getEpersongroupForWorkflowStep3() ?></td>
    </tr>
    <tr>
      <th>Submitter:</th>
      <td><?php echo $collection->getSubmitter() ?></td>
    </tr>
    <tr>
      <th>Admin:</th>
      <td><?php echo $collection->getAdmin() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('collections/edit?collection_id='.$collection->getCollectionId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('collections/index') ?>">List</a>
-->

<h3>Items in this collection</h3>
<?php use_helper('I18N', 'Date') ?>
 <?php if ($pager->haveToPaginate()): ?>
  <div class="sf_admin_pagination">
  <a href="<?php echo url_for('collections/show?collection_id='.$collection->getCollectionId());?>?page=1">
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/first.png', array('alt' =>'First page', 'title' => 'First page')) ?>
  </a>

  <a href="<?php echo url_for('collections/show?collection_id='.$collection->getCollectionId());?>?page=<?php echo $pager->getPreviousPage() ?>">
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/previous.png', array('alt' => 'Previous page', 'title' => 'Previous page')) ?>
  </a>

  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <?php echo $page ?>
    <?php else: ?>
      <a href="<?php echo url_for('collections/show?collection_id='.$collection->getCollectionId());?>?page=<?php echo $page ?>"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>

  <a href="<?php echo url_for('collections/show?collection_id='.$collection->getCollectionId());?>?page=<?php echo $pager->getNextPage() ?>">
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/next.png', array('alt' => 'Next page', 'title' => 'Next page')) ?>
  </a>

  <a href="<?php echo url_for('collections/show?collection_id='.$collection->getCollectionId());?>?page=<?php echo $pager->getLastPage() ?>">
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/last.png', array('alt' => 'Last page', 'title' => 'Last page')) ?>
  </a>
</div>
<?php endif; ?>

<?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
<?php if ($pager->haveToPaginate()): ?>
  <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
<?php endif; ?>

<ul class="list-detail">
<?php foreach ($pager->getResults() as $item): ?>
    <li>
        <a href="<?php echo url_for('items/show?item_id='.$item->item_id); ?>"><?php echo $item->metadata['dc.title']; ?></a>

        <span class="creator">
            <?php echo $item->metadata['dc.creator']; ?>
        </span>
    </li>
<?php endforeach; ?>
</ul>