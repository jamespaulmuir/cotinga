<?php use_helper('Filesize'); ?>
<h3><?php echo $bitstream->name; ?>
<span class="download">
   <a href="<?php echo sfConfig::get('app_dspace_url').'/retrieve/'.$bitstream->bitstream_id ?>">
       Download Original
   </a>
</span>
</h3>
<div class="pager">
    <?php
    $prev = null;
    $next = null;
    $current = null;
    foreach($bitstreams as $b){
        if($b->Format->internal == true) continue;
        if($current){
            $next = $b;
            break;
        }
        if(!$current && $b->bitstream_id == $bitstream->bitstream_id){
            $current = $b;
            continue;
        }
        $prev = $b;
    }
    

    ?>
    <?php if($prev): ?>
    <a href="<?php echo url_for('@bitstream_preview?bitstream_id='.$prev->bitstream_id); ?>">
        << Previous File
    </a>
    <?php endif; ?>
    <?php if($next): ?>
    <a href="<?php echo url_for('@bitstream_preview?bitstream_id='.$next->bitstream_id); ?>">
        Next File >>
    </a>
    <?php endif; ?>
</div>
<?php $format =  $bitstream->user_format_description != '' ? $bitstream->user_format_description : $bitstream->Format->short_description;
$mime = $bitstream->Format->mimetype;
?>

<?php
if($mime == 'application/pdf')
    include_partial('bitstream/pdf', array('bitstream'=>$bitstream));
else if(strpos($mime, 'image') > -1)
        include_partial('bitstream/img', array('bitstream'=>$bitstream));
else if($mime == 'text/plain')
    include_partial('bitstream/txt', array('bitstream'=>$bitstream));
else if($mime == 'text/html')
    include_partial('bitstream/iframe', array('bitstream'=>$bitstream));
?>

<?php slot('SideBar'); ?>
<table>
    <tr>
        <td>Name:</td><td><?php echo $bitstream->name;?></td>
    </tr>
    <tr>
        <td>Format:</td><td><?php echo $format;?></td>
    </tr>
    <tr>
        <td>Size:</td><td><?php echo format_bytes($bitstream->size_bytes); ?></td>
    </tr>
    <tr>
        <td>Checksum:</td><td><?php echo $bitstream->checksum_algorithm;?>: <?php echo $bitstream->checksum; ?></td>
    </tr>
</table>
<h3>About this item</h3>
<a href="<?php echo url_for('@item_seo?item_id='.$item->item_id.'&slug='.$item->getSlug()); ?>"><?php echo $item->metadata['dc.title'][0]; ?></a>
<table>
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
</table>
<?php end_slot(); ?>