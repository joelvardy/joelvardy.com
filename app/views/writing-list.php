<section page="<?php echo $slug; ?>">

    <header class="half-page">

        <nav>
            <a href="/" title="About Joel Vardy">About</a>
            <a href="/projects" title="Projects I've been involved in">Projects</a>
            <a class="active" href="/writing" title="Joel's Ramblings">Writing</a>
        </nav>

        <hgroup>
            <h1><a href="/" title="About Joel Vardy">Joel Vardy</a></h1>
            <h4>Need a <span>Web Developer</span>? <a href="/#contact" title="Contact Joel Vardy">Get in touch</a>!</h4>
        </hgroup>

    </header>

    <section id="content">

        <?php foreach ($posts as $post) : ?>
            <a class="post" href="/writing/<?php echo $post->slug; ?>" title="<?php echo $post->title; ?>">
                <h2><?php echo $post->title; ?></h2>
                <p><?php echo $post->intro; ?></p>
                <p class="posted">Posted: <strong><?php echo date('jS F Y', $post->posted); ?></strong></p>
            </a>
        <?php endforeach; ?>

    </section>

</section>
