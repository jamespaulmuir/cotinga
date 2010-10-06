<?php use_stylesheet('BreadCrumb.css'); ?>
<?php use_javascript('jquery.js'); ?>
<?php use_javascript('jquery.jBreadCrumb.1.1.js'); ?>
<?php slot('BreadCrumbs'); ?>
<div id="breadcrumbs" class="breadCrumb module">
    <ul>
        <li><a href="<?php echo url_for('@homepage'); ?>">Home</a></li>
<?php foreach($parts as $part): ?>
<li>
    <a href="<?php
    echo url_for(sprintf('@%s_seo?%s_id=%s&slug=%s',
            $part['type'],
            $part['type'],
            $part['id'],
            $part['slug']
    ));

    ?>"><?php echo $part['name']; ?></a>
</li>
<?php endforeach; ?>
</ul>
</div>
<script type="text/javascript">
$(document).ready(function() {
   $('#breadcrumbs').jBreadCrumb();
});
</script>
<?php end_slot(); ?>