<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="property-meta">
            <span class="meta-category"><?php the_category(); ?></span>
            <span class="meta-excerpt"><?php the_excerpt(); ?></span>
            <p><a href="<?php the_permalink(); ?>">Read more</p>

            <span class="property-date">Posted on <?php the_date(); ?></span>
        </div>
</li>