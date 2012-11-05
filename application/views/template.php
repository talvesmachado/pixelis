<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php print $title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?php print base_url('css/bootstrap-responsive.min.css'); ?>">
        <link rel="stylesheet" href="<?php print base_url('css/main.css'); ?>">
        <script src="<?php print base_url('js/vendor/modernizr-2.6.1.min.js'); ?>"></script>
		<?php if(isset($scripts_css)): ?>
			<link rel="stylesheet" href="<?php print base_url($scripts_css); ?>">
		<?php endif; ?>
		<?php if(isset($scripts_css_inline)): ?>
			<style type="text/css">
				<?php print $scripts_css_inline; ?>
			</style>
		<?php endif; ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
		<div class="main-wrapper">
		<?php
			$this->load->view('includes/header');
        ?>
		<?php
			$this->load->view($content_tpl);
        ?>
		<?php
			$this->load->view('includes/footer');
        ?>
        </div>
		<!-- JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php print base_url('js/vendor/jquery-1.8.2.min.js'); ?>"><\/script>')</script>
        <script src="<?php print base_url('js/vendor/bootstrap.min.js'); ?>"></script>
		<!-- JS MAIN -->
        <script src="<?php print base_url('js/plugins.js'); ?>"></script>
        <script src="<?php print base_url('js/main.js'); ?>"></script>
		<!-- JS from CONTROLER -->
		 <?php if(isset($scripts_js)): ?>
			<script src="<?php print base_url($scripts_js); ?>"></script>
		<?php endif; ?>
		<?php if(isset($scripts_js_inline)): ?>
			<script type="text/javascript">
				<?php print $scripts_js_inline; ?>
			</script>
		<?php endif; ?>
		<!-- JS GOOGLE TRACKER -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
