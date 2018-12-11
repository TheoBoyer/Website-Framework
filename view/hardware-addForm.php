<section class="form-container">
	<form method="post" action="?route=saveHardware">
		<?php 
			echo Form::text([
				"name"=>"hard_name",
				"label"=>"Nom de l'hardware"
			]);
		?>

		<?php 
			echo Form::select([
				"name"=>"cat_id",
				"label"=>"Catégorie de matériel",
				"option"=>$data["categories"]
			]);
		?>

		<?php 
			echo Form::select([
				"name"=>"brand_id",
				"label"=>"Marque du matériel",
				"option"=>$data["brands"]
			]);
		?>

		<?php 
			echo Form::submit([
				"value"=>"Ajouter le materiel"
			]);
		?>

	</form>
</section>