<?php
/*
Template Name: Archives
*/
get_header(); ?>

        <section id="primary">
            <div id="content" role="main">
                    
                    <?php the_post(); ?>
                    <header class="page-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>
                    
                    <h2>Archives by Subject:</h2>
                    <ul>
                        <?php wp_list_categories('show_count=1&title_li='); ?>
                    </ul>
                    
                    <h2>Week by Week:</h2>
                    <ul>
                        <?php wp_get_archives('type=weekly&show_post_count=1'); ?>
                    </ul>
                    
            </div><!-- #content -->
        </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>