require(["carousel"],function(Carousel){
    var imgArr1 = ["img/1.jpg","img/2.jpg","img/3.jpg","img/4.jpg"];
    var settings1 = {
        selector:"#container1",
        width:520,
        height:280,
        imgs:imgArr1,
        buttonStyle:'circle',//square
        arrowPos:'bottom',//center
        speed:500
    }
    var carousel1 = new Carousel();
    carousel1.init(settings1);
    var imgArr2 = ["img/1.jpg","img/2.jpg","img/3.jpg"];
    var settings2 = {
        selector:"#container2",
        width:520,
        height:280,
        imgs:imgArr2,
        buttonStyle:'square',//square
        arrowPos:'center',//center
        speed:1000
    }
    var carousel2 = new Carousel();
    carousel2.init(settings2);
});
/*require(["carousel"], function(Carousel){
    var imgArr1 = ["img/1.jpg", "img/2.jpg", "img/3.jpg", "img/4.jpg"];
    var settings1 = {
        selector : "#container1",//��ʾ�ֲ�ͼ��ʾ��λ��
        imgs : imgArr1,//��ʾ��ʾ��ͼƬ
        buttonStyle : "circle",//square ��ʾ��������ʽ
        arrowPos : "bottom",//center ��ʾǰ��ť��λ��
        speed : 500//��ʾͼƬ�ֻ����ٶ�
    };
    var carousel1 = new Carousel();
    carousel1.init(settings1);

    var imgArr2 = ["img/1.jpg", "img/2.jpg", "img/3.jpg"];
    var settings2 = {
        selector : "#container2",//��ʾ�ֲ�ͼ��ʾ��λ��
        imgs : imgArr2,//��ʾ��ʾ��ͼƬ
        buttonStyle : "square",//square ��ʾ��������ʽ
        arrowPos : "center",//center ��ʾǰ��ť��λ��
        speed : 1000//��ʾͼƬ�ֻ����ٶ�
    };
    var carousel2 = new Carousel();
    carousel2.init(settings2);

});*/
