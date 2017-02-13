//判断是不是一个数组
define(function(){
    function isArray(arr){
       if(arr instanceof Array){
           return true;
       }else
           return false;

    }
    return isArray;
});


