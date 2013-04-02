<h1>Joel Vardy</h1>

<h3>Photos</h3>

<?php

	foreach ($photos as $photo) {
		echo '	<h6>'.$photo->title.'</h6>
				<img src="'.$photo->url->medium.'" />';
	}

?>