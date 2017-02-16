define(["jquery"],function($){
    function Carousel(){
        this.container = $('<div class="carousel-container"></div>');
        this.imgs = $('<div class="carousel-imgs"></div>');
        this.tab = $(' <ul class="carousel-tab"></ul>');
        this.arrows = $('<div class="carousel-arrows"></div>');
        this.arrowsPrev = $(' <span class="carousel-arrows-prev">&lt;</span>');
        this.arrowsNext = $(' <span class="carousel-arrows-next">&gt;</span>');
        this.defaultSettings = {
            selector:"body",
            width:520,
            height:280,
            imgs:[],
            buttonStyle:'square',//square
            arrowPos:'center',//center
            speed:500
        }
    }
    Carousel.prototype.init = function(settings){
        $.extend(this.defaultSettings,settings);
        for(var i=0;i<this.defaultSettings.imgs.length;i++){
            var $img = $("<img src='"+this.defaultSettings.imgs[i]+"'alt=''>");
            this.imgs.append($img);
            var $li = $("<li></li>");
            if(this.defaultSettings.buttonStyle=="square"){
                $li.addClass('li-circle');
            }else{
                $li.html(i+1);
            }
            this.tab.append($li);
        }
        if(this.defaultSettings.arrowPos=="center"){
            this.arrowsPrev.addClass('arrows-center-left');
            this.arrowsNext.addClass('arrows-center-right');
        }
        $("img",this.imgs).eq(0).addClass('selected');
        $('li',this.tab).eq(0).addClass('selected');
        this.arrows.append(this.arrowsPrev).append(this.arrowsNext);
        this.container.css('height',this.defaultSettings.height);
        this.container.append(this.imgs).append(this.tab).append(this.arrows);
        $(this.defaultSettings.selector).append(this.container);
        var nowIndex = 0;
        var that = this;
        $('li',this.tab).on('mouseover',function(){
            nowIndex = $(this).index();
            changeImg();
        });
        this.arrows.on('click','span.carousel-arrows-prev',function(){
            //console.log(nowIndex);
            if(nowIndex==0){
                nowIndex = that.defaultSettings.imgs.length-1;
            }else{
                nowIndex--;
            }
            changeImg();
        });
        this.arrowsNext.on('click',function(){
            if(nowIndex==that.defaultSettings.imgs.length-1){
                nowIndex = 0;
            }else{
                nowIndex++;
            }
            changeImg();
        });
        play();
        this.container.hover(function(){
            clearInterval(that.timer);
        },function(){
            play();
        });

        function play(){
            that.timer = setInterval(function(){
                that.arrowsNext.trigger("click");
            },that.defaultSettings.speed);
        }

        function changeImg(){
            $('li',that.tab).eq(nowIndex).addClass('selected').siblings().removeClass('selected');
            $('img',that.imgs).eq(nowIndex).addClass('selected').siblings().removeClass('selected');

        }
    }
    return Carousel;

});

