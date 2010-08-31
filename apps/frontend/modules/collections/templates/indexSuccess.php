<h1>Collections</h1>
<ul class="list-detail">
    <?php foreach ($collections as $collection): ?>
<li><a href="<?php echo url_for('collections/show?collection_id='.$collection->getCollectionId()) ?>">
        <?php echo $collection->getName() ?>
    </a>
</li>
<?php endforeach; ?>
</ul>
