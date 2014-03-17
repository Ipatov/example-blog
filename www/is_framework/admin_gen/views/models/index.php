<div class="main_page_conteiner">
	<h3>Models gen</h3>
	<hr/>
	<form action="/models/gen/" method="post">
		<h4>Select table:</h4><br/>
		<select class="selectpicker" name="table_name">
		<?php foreach ($all_tables as $table) : ?>
			<option value="<?=$table;?>"><?=$table;?></option>
		<?php endforeach; ?>
		</select>
		<br/>
		<br/>
		<h4>Path gen:</h4><br/>
		<input style="width: 100%;" name="path_models" type="text" value="<?=SITE_PATH;?>new_models" />
		<br/>
		<br/>
		<input type="submit" class="btn btn-success" value="Start gen"/>
	<form>
</div>