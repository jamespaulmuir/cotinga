<?php use_helper('Filesize'); ?>
<h3><?php echo $title = $item->metadata['dc.title'][0]; ?></h3>
<table>
<?php if($show_full_record): ?>
    <?php foreach ($item->metadata as $name => $values): ?>
        <?php if(array_key_exists($name, sfConfig::get('app_metadata_full_hide'))) continue; ?>
        <?php foreach ($values as $value): ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $value; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
<a href="<?php echo url_for('items/show?item_id='.$item->item_id); ?>">Show simple item record</a>
<?php else: ?>
    <?php foreach (sfConfig::get('app_metadata_show') as $name => $metadata): ?>
        <?php if (isset($item->metadata[$name])): ?>
            <?php foreach ($item->metadata[$name] as $value): ?>
                <tr>
                    <td><?php echo $metadata['label']; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <a href="<?php echo url_for('items/show?item_id='.$item->item_id.'&full=true'); ?>">Show full item record</a>
<?php endif; ?>
</table>

                    <h3>Files in this Item</h3>
                    <ul>
    <?php foreach ($bundles as $bundle): ?>

    <?php if ($bundle->getName() == 'ORIGINAL' || 1): ?>

    <?php foreach ($bundle->Bitstreams as $bitstream): ?>
                                    <li>   

        <?php $handle_id = substr($item->metadata['dc.identifier.uri'][0], strrpos($item->metadata['dc.identifier.uri'][0], '/') + 1); ?>
                                    <a href="https://kb.osu.edu/dspace/retrieve/<?php echo $bitstream->bitstream_id; ?>">
            <?php echo $bitstream->getName(); ?> (<?php echo format_bytes($bitstream->size_bytes); ?>)
                                </a> -
        <?php echo $bitstream->user_format_description != '' ? $bitstream->user_format_description : $bitstream->Format->short_description; ?>

         


        <?php // print_R($bitstream->toArray(false)); ?>
                                </li>
    <?php endforeach; ?>

    <?php endif; ?>

    <?php endforeach; ?>
</ul>

