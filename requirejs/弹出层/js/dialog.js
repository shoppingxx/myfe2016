require.config({
    paths:{
        "jquery":"jquery-1.12.4"
    }
});
define(["jquery"],function($){

       return {
           open:function(obj){
               var settings = {
                   width:500,
                   heighe:300,
                   title:"中文好使吗",
                   content:"xfv xfb fx"
               }
               $.extend(settings,obj);
                var html =
                    '<div class="dialog-container">'+
                        '<div class="dialog-mask"></div>'+
                        '<div class="dialog-box">'+
                            '<div class="dialog-title">'+
                                '<div class="dialog-title-item">'+settings.title+'</div>'+
                                '<div class="dialog-title-close">[X]</div>'+
                            '</div>'+
                        '<div class="dialog-content"></div>'+
                        '</div>'+
                    '</div>'
               $('body').append(html);
               $('.dialog-box').css({
                   width:settings.width,
                   height:settings.height
               });
               $('.dialog-content').css({
                   height:settings.height-30
               });
               $('.dialog-content').load(settings.content);
               $('.dialog-title-close').on("click",function(){
                   $(".dialog-container").remove();
                   console.log(123);
               });

           }
       }
});
