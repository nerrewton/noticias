/**
 * Created by Rene Arteaga on 18/05/2018.
 */

var g_pagina = 0;
var canBeLoaded = true;

$(document).on('ready', function () {
    get_more_post();
});

//listen scroll
$(window).scroll(function(){

    //calcula el limite para cargar mas post
    var limite = ( $(document).height()/4 );

    if( $(document).scrollTop() > limite && canBeLoaded == true ){
        get_more_post();
    }

    console.log('Pagina: '+$(document).height()+' scroll actual: '+$(document).scrollTop()+' resta: '+limite);

});


//ajax load more
function get_more_post() {
    var url = g_ajax_url;

    $.ajax({
        url:url,
        type:'post',
        dataType: 'json',
        data:{
            action: 'loadmore',
            pagina:g_pagina
        },
        success:function (data) {
            //console.log(data);
            if(data.success){
                //$("#post_items").find('.col-lg-4:last-of-type').after(data.post);
                $("#post_items").append(data.post);
                g_pagina = data.pagina;

            }else{
                g_pagina = data.pagina - 1;
            }
        }
    });
}