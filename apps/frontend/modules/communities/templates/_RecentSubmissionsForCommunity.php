<h3>Recent Items In Community</h3>
<?php foreach($items as $date=>$group): ?>
<h4><?php echo $date; ?></h4>
<ul class="list-detail">
    <?php foreach($group as $item): ?>
    <li>
        <a href="<?php echo url_for('@item_seo?item_id='.$item->item_id.'&slug='.$item->getSlug()); ?>"><?php echo $item->metadata['dc.title'][0]; ?></a>
        <?php if(isset($item->metadata['dc.creator'])): ?>
        <span class="creator">
            <?php echo $item->metadata['dc.creator'][0]; ?>
        </span>
        <?php endif; ?>
    </li>
    <?php endforeach; ?>
</ul>
<?php endforeach; ?>

