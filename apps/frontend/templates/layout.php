<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <!-- navigation starts here -->
	<div id="nav">

		<ul>
			<li><a href="<?php echo url_for('@homepage'); ?>">Home</a></li>
		</ul>

	</div>

	<!-- header starts here -->
	<div id="header" class="short">
                <h1 id="logo-text"><a href="<?php echo url_for('@homepage'); ?>" title="<?php echo sfConfig::get('app_site_name'); ?>"><?php echo sfConfig::get('app_site_name'); ?></a></h1>
		<p id="slogan"><?php echo sfConfig::get('app_site_slogan');?></p>

	</div>

	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">
                <div id="sidebar" >

			<h3>Search <?php echo sfConfig::get('app_site_name'); ?></h3>
			<form action="#" class="searchform">
				<p>
					<input name="search_query" class="textbox" type="text" />
  					<input name="search" class="button" value="Search" type="submit" />
				</p>
			</form>      

			<h3>Browse</h3>
			<ul class="sidemenu">
				<li><a href="#">Communities & Collections</a></li>
				<li><a href="#">Issue Date</a></li>
                                <li><a href="#">Author</a></li>
                                <li><a href="#">Title</a></li>
                                <li><a href="#">Subject</a></li>
			</ul>

                        
                        <?php include_slot('SideBar'); ?>
		</div>

		<div id="main">
    <?php echo $sf_content ?>
                    	</div>

	<!-- content-wrap ends here -->
	</div></div>

	<?php include_partial('global/footer'); ?>
  </body>
</html>
