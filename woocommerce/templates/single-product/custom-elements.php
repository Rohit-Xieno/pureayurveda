<?php
$tonerbadges_img = get_field('tonerbadge_image', 'option');
?>
<img src="<?php echo esc_url($tonerbadges_img['url']) ?>" alt="">