require.config({
    paths : {
        "jquery" : "jquery-1.12.4"
    }
});
//dialog对应
/*require(["jquery","dialog"],function($,dialog){
    var obj = {
        width:350,
        height:350,
        title:"shopping又熬夜了",
        content:"login.html"
    }
    $('#btn').on("click",function(){
        dialog.open(obj);
    });
});*/
//对应dialog2
require(["jquery","dialog2"],function($,Dialog){
    var obj = {
        width:350,
        height:350,
        title:"shopping又熬夜了",
        content:"login.html"
    }
    $('#btn').on("click",function(){
        //alert(444);
        var dialog = new Dialog();
        dialog.open(obj);
    });
});

