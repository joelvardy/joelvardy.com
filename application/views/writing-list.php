<?php foreach ($posts as $post) : ?>
	<a class="post" href="/writing/<?php echo $post->slug; ?>" title="<?php echo $post->title; ?>">
		<h2><?php echo $post->title; ?></h2>
		<p><?php echo $post->intro; ?></p>
		<p class="posted">Posted: <strong><?php echo date('jS F Y', $post->posted); ?></strong></p>
	</a>
<?php endforeach; ?>
