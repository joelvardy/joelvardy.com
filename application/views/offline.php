CACHE MANIFEST
/
/projects
/workspace
/writing
<?php
	foreach ($writingPosts as $writingPost) {
		echo "/writing/{$writingPost->slug}\n";
	}
?>
/favicon.ico
<?php
	foreach ($fonts as $font) {
		echo $font."\n";
	}
?>
/assets/css/design.css
/assets/css/prism.css
/assets/js/main.min.js
/assets/js/vendor/prism.min.js
<?php
	foreach ($images as $image) {
		echo $image."\n";
	}
?>
