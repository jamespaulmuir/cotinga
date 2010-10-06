    <?php foreach($item->Bundles as $bundle): ?>
        <?php if($bundle->name == 'THUMBNAIL'): ?>
<li class="preview">
     <a href="<?php echo url_for('@item_seo?item_id='.$item->item_id.'&slug='.$item->getSlug()); ?>">
        <img src="<?php echo sfConfig::get('app_dspace_url'); ?>/retrieve/<?php echo $bundle->Bitstreams->getFirst()->bitstream_id; ?>"/>
</a>
    </li>
    <?php break; ?>
        <?php endif; ?>
    <?php endforeach; ?>