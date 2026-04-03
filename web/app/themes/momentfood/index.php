<?php

$restaurants = get_posts([
    'post_type' => 'restaurant',
    'posts_per_page' => 10,
]);

if ($restaurants) {
    foreach ($restaurants as $restaurant) {
        setup_postdata($restaurant);
        ?>

        <div>
            <pre><?php var_dump(get_field('name', $restaurant->ID)); ?></pre>
            <pre><?php var_dump(get_field('colors', $restaurant->ID)); ?></pre>
            <pre><?php var_dump(get_field('images', $restaurant->ID)); ?></pre>
            <pre><?php var_dump(get_field('order_now', $restaurant->ID)); ?></pre>
            <pre><?php var_dump(get_field('reserve', $restaurant->ID)); ?></pre>

            <a href="<?php echo get_permalink($restaurant); ?>">Read more</a>
        </div>

    <?php
    }
    wp_reset_postdata();
} else {
    ?>

    <p>No restaurants found.</p>
<?php } ?>