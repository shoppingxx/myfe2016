require.config({
    path:{
        "jquery":"js/jquery-1.12.4"
    }
});
define(["jquery"],function($){
    function Dialog(){
        this.settings = {
            width:500,
            height:300,
            title:"najiuzheyangba",
            content:"gfbgfhbfg"
        }
        this.container = $('<div class="dialog-container"></div>');
        this.mask = $('<div class="dialog-mask"></div>');
        this.box = $('<div class="dialog-box"></div>');
        this.title = $('<div class="dialog-title"></div>');
        this.item = $('<div class="dialog-title-item"></div>');
        this.close = $('<div class="dialog-title-close">[X]</div>');
        this.content = $('<div class="dialog-content"></div>');

    }
    Dialog.prototype.open = function(obj){
        //console.log(123);
        $.extend(this.settings,obj);
        this.item.html(this.settings.title);
        this.content.load(this.settings.content).css({
            height:this.settings.height
        });
        $('body').append(this.container);
        this.container.append(this.mask).append(this.box);
        this.box.append(this.title).append(this.content).css({
            height:this.settings.height,
            width:this.settings.width
        });
        this.title.append(this.close).append(this.item);
        var that = this;
        this.close.on("click", function(){
            that.closeDialog();
        });
    };
    Dialog.prototype.closeDialog = function(){
        this.container.remove();
    };
    return Dialog;
});
