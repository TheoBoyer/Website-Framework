<section id="hardware_list">
	<ul>
	<?php foreach ($data["hardware"] as $h) { ?>
		<li>
			<article class="hardware_container">
				<h1><?php echo $h->name ?></h1>
				<span class="category"><?php echo $h->category->name ?></span>
				<span class="brand"><?php echo $h->brand->name ?></span>
			</article>
		</li>
	<?php } ?>
	</ul>
</section>