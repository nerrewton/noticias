<?php
/**
 * Created by PhpStorm.
 * User: Rene Arteaga
 * Date: 22/05/2018
 * Time: 20:43
 */

$modulo = $contador_aux % 2;

if($contador_aux == 0 || $modulo == 0){
    echo $contador_aux != 0 ? '</div>' : '';
    echo '<div class="col-lg-4">';
}
?>
<div class="ibox">
    <div class="ibox-content box_post">

        <?php
        $post_thumbnail_id = get_post_thumbnail_id();
        $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
        ?>

        <div class="image_post_home">
            <a href="<?php the_permalink(); ?>" rel="nofollow" >
                <div class="image">
                    <img alt="image" class="img-responsive" src="<?php echo $post_thumbnail_url; ?>">
                </div>
            </a>
        </div>
        <a href="<?php the_permalink(); ?>" title=" <?php the_title(); ?>" rel="nofollow" class="btn-link">
            <h2>
                <?php the_title(); ?>
            </h2>
        </a>
        <div class="row">
            <div class="col-md-6">
                <strong>Autor:</strong> <?php the_author_meta( 'display_name'); ?>
            </div>
            <div class="col-md-6">
                <div class="small text-right">
                    <?php

                    $comments = get_comments(array('post_id'=> get_the_ID()));
                    $number_comments = sizeof($comments);

                    ?>
                    <div> <i class="fa fa-comments-o"> </i> <?php echo $number_comments; ?> comentarios</div>
                </div>
            </div>
        </div>
    </div>
</div>
