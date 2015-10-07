<section page="<?php echo $slug; ?>">

    <header class="half-page">

        <nav>
            <a href="/" title="About Joel Vardy">About</a>
            <a class="active" href="/projects" title="Projects I've been involved in">Projects</a>
            <a href="/writing" title="Joel's Ramblings">Writing</a>
        </nav>

        <hgroup>
            <h1><a href="/" title="About Joel Vardy">Joel Vardy</a></h1>
            <h4>Need a <span>Web Developer</span>? <a href="/#contact" title="Contact Joel Vardy">Get in touch</a>!</h4>
        </hgroup>

    </header>

    <section id="content">

        <h2>Projects</h2>

        <p>Below are some of the projects I have been involved in, if you would like a full CV please <a href="/#contact" title="Contact Joel Vardy">get in touch</a>.</p>

        <?php

            foreach ($projects as $project) {
                echo $project;
            }

        ?>

    </section>

</section>
