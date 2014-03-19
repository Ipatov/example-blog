<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<meta name="description" content="<?=$metaTags->description;?>">
	<meta name="keywords" content="<?=$metaTags->keywords;?>">

	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
	<link rel="shortcut icon" href="/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="/css/main.css" />
	<script type="text/javascript" src="/js/script.js"></script>
	<title><?=$metaTags->title;?></title>
</head>

<?php
	if(($controllerName == 'index') AND ($actionName == 'index')){
		$mainPage = true;
	}else{
		$mainPage = false;	
	}
?>
<body>
	<div class="main_container">
		<div class="<?=($mainPage) ? 'main_bg' : 'all_page_bg';?>">
			<div class="info_user">
			
			</div>
			<?php
				if(!$mainPage) echo '<div class="all_page_div">';
				include ($contentPage);
				if(!$mainPage) echo '</div>';
			?>
			<?php if(!$mainPage): ?>
				<div class="footer_div">
					<a href="/"><< main</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>