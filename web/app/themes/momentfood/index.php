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
            <p> <?php echo get_field('name', $restaurant->ID); ?> </p>
            <?php
            $image_array = get_field('images', $restaurant->ID);

        if ($image_array) {
            $logo = $image_array['brand_logo'];
            $wp_desktop = $image_array['brand_wp_desktop'];
            $wp_mobile = $image_array['brand_wp_mobile'];
            echo '<img src="'.esc_url($logo).'" alt="Restaurant Logo">';
            echo '<img src="'.esc_url($wp_desktop).'" alt="Restaurant Desktop Image">';
            echo '<img src="'.esc_url($wp_mobile).'" alt="Restaurant Mobile Image">';
        }
        ?>

            <a href="<?php echo get_permalink($restaurant); ?>">Read more</a>
        </div>

    <?php
    }
    wp_reset_postdata();
} else {
    ?>

    <p>No restaurants found.</p>
<?php } ?>