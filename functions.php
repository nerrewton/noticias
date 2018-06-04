<?php
/**
 * Created by PhpStorm.
 * User: Rene Arteaga
 * Date: 19/05/2018
 * Time: 14:33
 */
ini_set('display_errors', true);

add_action('wp_ajax_cloadmore', 'json_comments'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_cloadmore', 'json_comments'); // wp_ajax_nopriv_{action}

add_action('wp_ajax_loadmore', 'json_loadpost'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'json_loadpost'); // wp_ajax_nopriv_{action}

//add_action();//admin custom post image input

/**
 * Load more comments single.php post page
 */

function json_comments(){

    $post = $_POST['post_id'];
    $total = $_POST['total'];
    $url = $_POST['url'];
    $mostrados = $_POST['mostrados'];
    $tmp_mostrados = $mostrados;

    $return = array('success' => false, 'mostrados' => 0 ,'comment' => '' );

    if($mostrados < $total){

        $comments = get_comments(array('post_id' => $post));

        for($i = $mostrados; $i < $tmp_mostrados+3; $i++):

            if(!isset($comments[$i]))break;

            $comment = $comments[$i];

            $mostrados++;
            $return['comment'] .= '<div class="social-feed-box">
                    <div class="social-avatar">
                        <a href="" class="pull-left">
                            <img alt="image" src="'.$url.'/img/1.png">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                '.$comment->comment_author.'
                            </a>
                            <small class="text-muted">'.$comment->comment_date.'</small>
                        </div>
                    </div>
                    <div class="social-body">
                        <p>
                            '.$comment->comment_content.'
                        </p>
                    </div>
               </div>';


        endfor;

        $return['success'] = true;

    }else{
        $return['success'] = false;
    }

    $return['mostrados'] = $mostrados;

    print_r(json_encode($return));
    die;
}

/**
 * Load more post index.php home page
 */

//global $contador_aux;//contador de post

function json_loadpost(){

    //contador de post
    $contador_aux = 0;
    $return = array('success' => false, 'post' => '', 'pagina' => 0);
    $pagina_mostrada = $_POST['pagina'] + 1;
    $return['pagina'] = $pagina_mostrada;

    $args['paged'] = $pagina_mostrada; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts( $args );

    if( have_posts() ) :
        $return['success'] = true;
        // run the loop
        while( have_posts() ): the_post();

        $modulo = $contador_aux % 2;

        if($contador_aux == 0 || $modulo == 0){
            $return['post'] .= $contador_aux != 0 ? '</div>' : '';
            $return['post'] .= '<div class="col-lg-4">';
        }


        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );

        $comments = get_comments(array('post_id'=> get_the_ID()));
        $number_comments = sizeof($comments);


        $return['post'] .= '<div class="ibox">
            <div class="ibox-content box_post">
                <div class="image_post_home">
                    <a href="'.esc_url( get_permalink() ).'" rel="nofollow" >
                        <div class="image">
                            <img alt="image" class="img-responsive" src="'.$post_thumbnail_url.'">
                        </div>
                    </a>
                </div>
                <a href="'.esc_url( get_permalink() ).'" title="'.get_the_title().'" rel="nofollow" class="btn-link">
                    <h2>
                        '. get_the_title().'
                    </h2>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Autor:</strong> '.get_the_author_meta( 'display_name').'
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
                            <div> <i class="fa fa-comments-o"> </i> '.$number_comments.' comentarios</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

            $contador_aux ++;
        endwhile;

    endif;

    print_r(json_encode($return));
    die; // here we exit the script and even no wp_reset_query() required!
}
