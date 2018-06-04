/**
 * Created by Rene Arteaga on 19/05/2018.
 */

var btn_comment = $("#ver_mas"); //boton ver mas comentarios
var total_comentarios = g_number_comments; //numero de comentarios del post
var comentarios_mostrados = 0; //numero de comentarios mostrados
var url = g_canonical_url; //canonical url


$(document).ready(function () {

    if(total_comentarios == 0){
        btn_comment.remove();
    }else if(comentarios_mostrados == 0){
        get_comments();
    }

    btn_comment.on('click', function () {
        get_comments();
    });

});

//trae comentarios
function get_comments(){

    $.ajax({
        url:g_ajax_url,
        type:'post',
        dataType:'json',
        data:{
            action: 'cloadmore', // the parameter for admin-ajax.php
            post_id:g_id_p,
            mostrados:comentarios_mostrados,
            total:total_comentarios,
            url: url
        },
        beforeSend : function ( xhr ) {
            btn_comment.text('Cargando...'); // some type of preloader
        },
        success:function(data){
            console.log(data);

            if(data.success){
                comentarios_mostrados = data.mostrados;
                btn_comment.text('Ver m\xe1s...'); // some type of preloader
                $(".comment_items").append(data.comment);
            }else {
                btn_comment.remove();
            }

        }
    })
}

//reemplaza all ocurrences
function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}