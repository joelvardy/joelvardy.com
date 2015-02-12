<section page="<?php echo $slug; ?>">

	<h2>Projects</h2>

	<p>Below are some of the projects I have been involved in, would you like to <a class="filter" href="" title=""></a>?</p>

	<?php

		foreach ($projects as $project) {
			echo $project;
		}

	?>

</section>
