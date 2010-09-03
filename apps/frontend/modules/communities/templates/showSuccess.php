<h2><?php echo $community->getName() ?></h2>

<?php if($community->LogoBitstream != null): ?>
<img style="float:right; "src="https://kb.osu.edu/dspace/retrieve/<?php echo $community->LogoBitstream->bitstream_id; ?>"/>
<?php endif; ?>
<?php echo html_entity_decode($community->getIntroductoryText()) ?>

<?php echo html_entity_decode($community->getSideBarText()) ?>



<?php if(count($subcommunities) > 0): ?>
<h3>Sub-communities within this community</h3>
<ul>
<?php foreach($subcommunities as $subcommunity): ?>
    <li>
    <a href="<?php echo url_for('communities/show?community_id='.$subcommunity->community_id); ?>">
    <?php echo $subcommunity->name; ?></a>

    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if(count($collections) > 0): ?>
<h3>Collections in this community</h3>
<ul>
<?php foreach($collections as $collection): ?>
    <li><a href="<?php echo url_for('collections/show?collection_id='.$collection->getCollectionId()) ?>">
        <?php echo $collection->getName() ?>
    </a></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
