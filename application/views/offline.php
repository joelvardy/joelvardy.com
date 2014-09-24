CACHE MANIFEST

# Git commit: <?php echo `git rev-parse --verify HEAD 2> /dev/null`; ?>

CACHE:
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
/assets/minified/design.css
/assets/minified/main.js
<?php
	foreach ($images as $image) {
		echo $image."\n";
	}
?>

NETWORK:
*
