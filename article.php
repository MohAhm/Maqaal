<?php 
 
	require_once('db_connect.php');

	$page = (isset($_GET['page'])) ? $_GET['page'] : "";

 ?>

<!doctype html> 
<html lang="SV"> 
<head> 
	<meta charset="UTF-8">
	<title>Maqaal</title> 
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">  
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link href="css/normalize.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/sv_SE/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<header>
		<div id="meny">
			<div  class="wrap">
				<h1 class="logo"><?php echo "<a href='index.php?page=1'>"; ?><img src="img/logo.png" alt="Logo"><?php echo "</a>"; ?></h1>

				<nav>
					<ul>
						<?php 

							$sql = "SELECT * FROM nav";
							$result = mysql_query($sql);

							while($row = mysql_fetch_array($result)) {

								$nav_id = $row['id'];
								$nav_name = $row['name'];
								$nav_url = $row['url'];
								$nav_title = $row['title'];

								echo "<li><a href=$nav_url title=$nav_title>$nav_name</a></li>";
							}
								echo "<li><a href=forum.php>Forum</a></li>";
						 ?>
					</ul>
				</nav>
			</div><!-- end wrap-->
		</div><!-- end meny -->
	</header>


	<div id="bg">
		<div class="wrap grupp">
			<section id="content"> 	
				<article>	
					<div class="artikle">
						<?php 

							if(isset($_REQUEST['s'])) {

								require("search.php"); 

							} else {

								$article = (isset($_GET['article'])) ? $_GET['article'] : "1";

								$sql = "SELECT article_id FROM pages WHERE article_id=$article";
								$result = mysql_query($sql);

								while($row = mysql_fetch_array($result)) {

									$article_id = $row['article_id'];

									$sql2 = "SELECT * FROM articles WHERE id=$article_id" or die('Not connected');
									$result2 = mysql_query($sql2);

									while($row2 = mysql_fetch_array($result2)) {

										$id = $row2['id'];
										$datum = $row2['datum'];
										$title =$row2['title'];
										$article_text =$row2['article'];

										echo "<img src=img.php?id=$id width=740 height=450 alt='bild'/>";
										echo "<h3>$title<br /><small>";
										echo date('M d, Y', $datum);
										echo "</small></h3>";
										echo nl2br("$article_text");

									}
								}
							}
						 ?>
						<br>
						<div class="fb-comments" data-href="http://moh-ahm.com" data-width="740" data-numposts="5" data-colorscheme="light"></div>
					</div><!-- end artikle-->
				</article>		
			</section><!-- end conntent -->

			<aside>
				<div id="side-box">
					<div id="sok">					
						<form action="index.php" method="GET">
							<input type="search" title="sök" name="s" placeholder="Sök ..." />
									
							<input type="submit" name="submit" value="sök" class="btn img-center sok-img" title="Sök">
							</form>
					</div><!-- end sok -->

					<div id="social">
						<h4>Social</h4>
	
						<div class="soc side-inner">
							<a href="https://www.facebook.com/" target="_blank"><img src="img/fac.png" alt="Facebook" title="Följ oss i Facebook"></a>
							
							
							<a href="https://twitter.com/" target="_blank"><img src="img/twi.png" alt="Twitter" title="Följ oss i Twitter"></a>

							<a href="https://plus.google.com" target="_blank"><img src="img/gol.png" alt="Google" title="Följ oss i Google +"></a>
						</div><!-- end soc -->
					</div><!-- end social -->
					
					<!-- Google Adsense  -->
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Annons-1 -->
					<ins class="adsbygoogle"
						 style="display:inline-block;width:300px;height:600px"
						 data-ad-client="ca-pub-9708796616689146"
						 data-ad-slot="4023162315"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					<!-- end Google Adsense  --> 
					
				</div><!-- end side-box -->
			</aside>
		</div><!-- end wrap grupp -->
	</div><!-- end bg -->


	<div id="email">
		<div class="wrap grupp">
			<h4>Håll dig uppdaterad med de senaste nyheterna</h4>

		<!-- Begin MailChimp Signup Form -->
		<div id="mc_embed_signup">
			<form action="http://moh-ahm.us3.list-manage1.com/subscribe/post?u=44e9dbe13080f68d457841fbc&amp;id=b1c868568e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					
				<div class="mc-field-group">
					<input type="email" title="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="email@address">
				</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;"><input type="text" title="text" name="b_44e9dbe13080f68d457841fbc_b1c868568e" value=""></div>
					<div class="clear"><input type="submit" value="Prenumerera" name="subscribe" id="mc-embedded-subscribe" class="btn-L"></div>
			</form>
		</div>
		<!--End mc_embed_signup-->	
		
		</div><!-- end wrap -->
	</div><!-- end email -->
	
	<footer>
		<div class="wrap">
			<small class="copy">&copy; <?php echo date("Y"); ?> - Maqaal. All rights reserved.</small>
		</div><!-- end wrap -->
	</footer>
</body>
</html>

<?php require_once('db_close.php'); ?>

