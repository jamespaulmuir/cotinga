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
			<li id="current"><a href="index.html">Home</a></li>
			<li><a href="index.html">News</a></li>
			<li><a href="index.html">Downloads</a></li>
			<li><a href="index.html">Support</a></li>
			<li><a href="index.html">About</a></li>
		</ul>

	</div>

	<!-- header starts here -->
	<div id="header">

		<div id="clouds"></div>

		<h1 id="logo-text"><a href="<?php echo url_for('@homepage'); ?>" title="">knowledge bank&sup2;</a></h1>
		<p id="slogan">University Libraries and Office of the Chief Information Officer</p>

	</div>

	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">
                <div id="sidebar" >

			<h3>Search Knowledge Bank</h3>
			<form action="#" class="searchform">
				<p>
					<input name="search_query" class="textbox" type="text" />
  					<input name="search" class="button" value="Search" type="submit" />
				</p>
			</form>
                        <ul class="sidemenu">
                            <li><a href="#">Home</a></li>
                            <li class="no-icon">
                                  <select name="kblinks" class="navigationBarItem">
                                   <option selected value="/dspace/handle/1811/139">About the Knowledge Bank</option>
                                   <option value="http://library.osu.edu/sites/kbinfo/faqs.html">FAQs</option>
                                   <option value="http://library.osu.edu/sites/kbinfo/policies.html">Policies</option>
                                   <option value="http://library.osu.edu/sites/kbinfo/videos.html">Video Procedures</option>
                                   <option value="http://library.osu.edu/sites/kbinfo/kbsetupform.htm">Community Setup Form</option>
                                   <option value="http://library.osu.edu/sites/techservices/KBAppProfile.php">Describing Your Resources</option>
                                   <option value="http://library.osu.edu/sites/kbinfo/Knowledge_Bank_License_Agreement_2010.pdf">Knowledge Bank License Agreement</option>
                                   </select>
       <button type="button">Go</button>
                            </li>
                        </ul>
      

			<h3>Browse</h3>
			<ul class="sidemenu">
				<li><a href="#">Communities & Collections</a></li>
				<li><a href="#">Issue Date</a></li>
                                <li><a href="#">Author</a></li>
                                <li><a href="#">Title</a></li>
                                <li><a href="#">Subject</a></li>
			</ul>


		</div>

		<div id="main">
    <?php echo $sf_content ?>
                    	</div>

	<!-- content-wrap ends here -->
	</div></div>

	<!-- footer starts here-->
	<div id="footer-wrap">

		<!-- columns starts here-->
		<div id="columns">

			<div class="col3">
				<h3>Tincidunt</h3>
				<ul>
					<li><a href="index.html">consequat molestie</a></li>
					<li><a href="index.html">sem justo</a></li>
					<li><a href="index.html">semper</a></li>
					<li><a href="index.html">magna sed purus</a></li>
					<li><a href="index.html">tincidunt</a></li>
				</ul>
			</div>
			<div class="col3-center">
				<h3>Sed purus</h3>
				<ul>
					<li><a href="index.html">consequat molestie</a></li>
					<li><a href="index.html">sem justo</a></li>
					<li><a href="index.html">semper</a></li>
					<li><a href="index.html">magna sed purus</a></li>
					<li><a href="index.html">tincidunt</a></li>
				</ul>
			</div>
			<div class="col3">
				<h3>Praesent</h3>
				<ul>
					<li><a href="index.html">consequat molestie</a></li>
					<li><a href="index.html">sem justo</a></li>
					<li><a href="index.html">semper</a></li>
					<li><a href="index.html">magna sed purus</a></li>
					<li><a href="index.html">tincidunt</a></li>
				</ul>
			</div>

		<!-- columns ends -->
		</div>

		<div id="footer-bottom">
			<p>
			&copy; 2010 <strong>Your Company</strong>

            &nbsp;&nbsp;&nbsp;&nbsp;

			<a href="http://www.bluewebtemplates.com/" title="Website Templates">website templates</a> by <a href="http://www.styleshout.com/">styleshout</a>

			&nbsp;&nbsp;&nbsp;&nbsp;

			<a href="index.html">Home</a> |
   		    <a href="index.html">Sitemap</a> |
	  		<a href="index.html">RSS Feed</a> |
            <a href="http://validator.w3.org/check?uri=referer">XHTML</a> |
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
			</p>
		</div>

	<!-- footer ends-->
	</div>
  </body>
</html>
