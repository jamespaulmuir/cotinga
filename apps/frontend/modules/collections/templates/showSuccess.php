<h2><?php echo $collection->getName() ?></h2>

<h3>Items in this collection</h3>
<?php use_helper('I18N', 'Date') ?>
 <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
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
        <?php if(isset($item->metadata['dc.creator'])): ?>
        <span class="creator">
            <?php echo $item->metadata['dc.creator']; ?>
        </span>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>