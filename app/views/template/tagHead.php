<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title><?=isset($titleTag)?$titleTag:$this->config['titleTag']?></title>
        <!-- OG Tags -->        
        <meta property="og:title" content="<?=isset($tagOgTitle)?$tagOgTitle:$this->config['og:title']?>" />
        <meta property="og:type" content="<?=isset($tagOgType)?$tagOgType:$this->config['og:type']?>" />
        <meta property="og:url" content="<?='https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
        <meta property="og:image" content="<?=isset($tagOgImage)?$tagOgImage:$this->config['og:image']?>" />
        <meta property="og:description" content="<?=isset($tagOgDescription)?$tagOgDescription:$this->config['og:description']?>" />
        <!-- OG Tags -->
		<!-- Description, Keywords and Author -->
		<meta name="description" content="<?=isset($tagOgDescription)?$tagOgDescription:$this->config['og:description']?>">
		<meta name="keywords" content="<?=isset($tagKeywords)?$this->config['keywords'].', '.$tagKeywords:$this->config['keywords']?>">
		<meta name="author" content="septiadi.com">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="<?=SITE?>css/bootstrap.min.css" rel="stylesheet">
		<?php
		if(isset($sidebarnav))
		echo '		
		<!-- Sidebar nav -->
		<link href="'.SITE.'css/sidebar-nav.css" rel="stylesheet">
		';
		?>
        
        <script>
        var SITE = "<?=SITE?>";
        </script>
        
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" href="<?=SITE?>css/settings.css" media="screen" />
		<!-- Flex slider -->
		<link href="<?=SITE?>css/flexslider.css" rel="stylesheet">
		<link href="<?=SITE?>css/owl.carousel.css" rel="stylesheet">	
		<link href="<?=SITE?>css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="<?=SITE?>css/style.css" rel="stylesheet">
		<!-- Stylesheet for Color -->
		<link href="<?=SITE?>css/brown.css" rel="stylesheet">
        
        <!-- Social Account -->
		<link href="<?=SITE?>css/bootstrap-social.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?=SITE?>img/favicon/favicon.png">
	</head>
