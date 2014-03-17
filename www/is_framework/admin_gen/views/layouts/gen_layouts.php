<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="language" content="en" /> 
	<script src="/assets/gen_admin/js/jquery.1.10.js"></script>
	<script src="/assets/gen_admin/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/gen_admin/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/assets/gen_admin/css/bootstrap-select.min.css" />
	<link rel="stylesheet" type="text/css" href="/assets/gen_admin/css/main.css" />
	<title>Admin_gen</title> 
</head>
<body>
<div class="main_conteiner">
	<hr/>
	<h4>Admin_gen</h4>
	<hr/>
	<?php
		include ($contentPage);
	?>
	<hr/>
	<h4> © Ipatov <?=date('Y');?>. Admin_gen</h4>
</div>
</body>
</html>