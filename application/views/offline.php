CACHE MANIFEST

# Git commit: <?php echo `git rev-parse --verify HEAD 2> /dev/null`; ?>

CACHE:
/
/projects
/workspace
/writing
<?php
	foreach ($writing_posts as $post) {
		echo "/writing/{$post->slug}\n";
	}
?>
/favicon.ico
<?php
	foreach ($fonts as $font) {
		echo $font."\n";
	}
?>
/assets/minified/design.css
/assets/minified/app.js
<?php
	foreach ($images as $image) {
		echo $image."\n";
	}
?>

NETWORK:
*
