<h2><?php echo $item->metadata['dc.title']; ?></h2>

<table>
<?php foreach($item->metadata as $name=>$value): ?>
<tr>
    <td><?php echo $name; ?></td>
    <td><?php echo $value; ?></td>
</tr>
<?php endforeach; ?>

</table>

<h3>Files in this Item</h3>
<ul>
<?php foreach($bundles as $bundle): ?>

<?php if($bundle->getName() == 'ORIGINAL' || 1): ?>

<?php foreach($bundle->Bitstreams as $bitstream): ?>
<li>    (<?php echo $bitstream->sequence_id; ?>) <?php echo $bundle->name; ?>:    <?php echo $bitstream->getName(); ?>  -

        <?php echo $bitstream->Bitstreamformatregistry->short_description; ?>

        

    <?php // print_R($bitstream->toArray(false)); ?>
</li>
    <?php endforeach; ?>

<?php endif; ?>
    
<?php endforeach; ?>
</ul>