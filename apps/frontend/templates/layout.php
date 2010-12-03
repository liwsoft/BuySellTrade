<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
	<div id="page">
		<header>
			<h1><?php echo link_to('Inzercia', '@homepage') ?></h1>
			<p>inzercia.utociste.sk</p>
		</header>
		<div id="userMenu">
			<?php echo include_component('user', 'menu') ?>
		</div>
		<nav>
			<ul>
				<li class="header">Vyhľadávanie</li>
				<li class="text">
					<input type="text" name="search" />
					<button type="submit">&gt;</button>
				</li>
			</ul>
			<ul>
				<li class="header">Kategórie</li>
				<li><a href="#">Auto, moto</a></li>
				<li><a href="#">Oblečenie, obuv, doplnky</a></li>
				<li><a href="#">Služby</a></li>
				<li><a href="#">Spotrebná elektronika</a></li>
				<li><a href="#">Detské potreby</a></li>
				<li><a href="#">Hračky, hry</a></li>
				<li><a href="#" class="active">Počítače, notebooky</a></li>
				<li><a href="#">Reality, nehnuteľnosti</a></li>
				<li><a href="#">Telefóny</a></li>
				<li><a href="#">Zdravie, krása</a></li>
				<li><a href="#">Dom, záhrada</a></li>
				<li><a href="#">Kultúra, hudba, knihy</a></li>
				<li><a href="#">Práca, brigády</a></li>
				<li><a href="#">Šport, športové potreby</a></li>
				<li><a href="#">Umenie, starožitníctvo</a></li>
				<li><a href="#">Zvieratá, zvieracie potreby</a></li>
			</ul>
		</nav>
		<section>
			<?php echo $sf_content ?>
		</section>
		<footer>
			Copyright &copy; inzercia.utociste.sk. All rights reserved. &nbsp;|&nbsp;
			Created by <a href="http://www.linkesch.sk">Pavel Linkesch</a> &amp; Miroslav Vrlík<br />
			Powered by <a href="#">BuySellTrade</a> released as open source
		</footer>
	</div>
	
	<div id="fb-root"></div>
	<script type="text/javascript">
	window.fbAsyncInit = function() {
	  FB.init({
	  	appId: '<?php echo sfConfig::get('app_facebook_app_id') ?>',
	    status: true,
	    cookie: true
	 	});
	};
	(function() {
		var e = document.createElement('script'); e.async = true;
	  e.src = document.location.protocol +
	    '//connect.facebook.net/sk_SK/all.js';
	    document.getElementById('fb-root').appendChild(e);
	}());
	</script>
  </body>
</html>
