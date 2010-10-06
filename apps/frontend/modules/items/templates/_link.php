<li>
<a href="<?php echo url_for('@item_seo?item_id='.$item->item_id.'&slug='.$item->getSlug()); ?>"><?php echo $item->metadata['dc.title'][0]; ?></a>
<?php if(isset($item->metadata['dc.creator'])): ?>
<span class="creator">
    <?php echo $item->metadata['dc.creator'][0]; ?>
</span>
<?php endif; ?>
</li>