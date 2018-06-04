<?php get_header(); ?>
<div class="wrapper wrapper-content  animated fadeInRight blog">
    <div class="row">
        <?php
        // Start the loop.
        if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <div class="col-lg-2">
            <!-- Ads content -->

        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <article>
                        <div class="body_article white-bg">
                            <header>
                                <h1><?php the_title(); ?></h1>
                                <div class="text-center ">
                                    <span class="text-muted">
                                        <i class="fa fa-clock-o"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                            </header>

                            <div class="ads_google">
                                <!-- Ads google content -->
                            </div>

                            <div class="cuerpo_post">
                                <?php the_content(); ?>
                            </div>
                            <div class="ads_google">
                                <!-- Ads google content -->
                            </div>

                            <footer>
                                <label>
                                    <strong>Autor:</strong>
                                </label>
                                <div class="social-feed-box">
                                    <div class="social-avatar">
                                        <a href="#" class="pull-left">
                                            <img alt="image" src="<?php echo get_avatar_url( 'ID'); ?>">
                                        </a>
                                        <div class="media-body">
                                            <?php the_author_posts_link(); ?>
                                        </div>
                                    </div>
                                    <div class="social-body">
                                        <p>
                                            <?php the_author_meta('user_description'); ?>
                                        </p>
                                    </div>
                                </div>
                            </footer>

                        </div>

                    </article>
                </div>
                <div class="col-lg-12">
                    <div class="ibox comments">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-lg-12 comment_items">
                                    <h2>Comentarios:</h2>

                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button class="btn btn-default" id="ver_mas">Ver m&aacute;s...</button>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <a data-toggle="modal" class="btn btn-primary" href="#nuevo_comentario"><i class="fa fa-plus"></i> Agregar un comentario</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <!-- Ads content -->
        </div>
        <!-- modals -->
        <div id="nuevo_comentario" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="respond">
                            <h3 id="reply-title">
                                Deja un comentario
                                <small>
                                    <a rel="nofollow" id="cancel-comment-reply-link" href="/wordpress/2017/11/16/el-bachiller-auxiliar-de-policia-de-quien-todos-estan-hablando/#respond" style="display:none;">Cancelar respuesta</a>
                                </small>
                            </h3>
                            <form action="http://localhost/wordpress/wp-comments-post.php" method="post" id="commentform">
                                <p class="text-muted">Tu dirección de correo electrónico no será publicado. Los campos obligatorios están marcados con <span class="text-danger">*</span></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label" for="comment"><span class="required text-danger">*</span> Comentario:</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="3" maxlength="65525" aria-required="true" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label" for="author"><span class="required text-danger">*</span> Nombre:</label>
                                            <input class="form-control" id="author" name="author" type="text" value="" maxlength="245" aria-required='true' required='required' />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label" for="email"><span class="required text-danger">*</span> Correo electrónico:</label>
                                            <input class="form-control" id="email" name="email" type="text" value="" maxlength="100" aria-describedby="email-notes" aria-required='true' required='required' />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input name="submit" type="submit" id="submit" class="btn btn-primary" value="Publicar comentario" />
                                            <input type='hidden' name='comment_post_ID' value='<?php echo get_the_ID(); ?>' id='comment_post_ID' />
                                            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modals -->

        <?php
        // End of the loop.
        endwhile; endif;

        //get max number of pages comment
        $cpage = get_query_var('cpage') ? get_query_var('cpage') : 1;
        ?>
    </div>
</div>
<script>

    <?php

    $comments = get_comments(array('post_id'=> get_the_ID()));
    $number_comments = sizeof($comments);

    ?>

    var g_id_p = '<?php echo get_the_ID(); ?>';
    var g_ajax_url = '<?php echo site_url('wp-admin/admin-ajax.php'); ?>';
    var g_cpage = '<?php echo $cpage; ?>';
    var g_number_comments = <?php echo $number_comments; ?>;
    var g_canonical_url = '<?php bloginfo('template_directory')?>';

</script>
<script src="<?php bloginfo('template_directory')?>/js/custom/single.js"></script>
<?php get_footer(); ?>
