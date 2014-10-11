jQuery.jsbyz =  {
    /*****************************
    *  通知插件,显示操作结果。
    * 参数:{content:"text"，style:"default | success |warning | error", 
    * position :"top |left |right | bottom | right-bottom",
    * timeout : seconds(int), 
    ******************************/
    notify: {
        container:$("<div>"),
        //创建一个容器
        create: function() {
            var option = arguments[0];
            if(!option) {
                option = {
                    width:"60%",
                    top:"30px"
                }
            }
            var showWidth = option.width ? option.width : "%60";
            var pTop = option.top ? option.top : "30px";

            this.container.addClass("jsbyz-notify-container");
            this.container.css({
                width:showWidth,
                top:pTop
                });
            $("body").append(this.container);
            return this;
        },
        show:function() {
            if(!arguments[0]) {
                return;
            }
                var option = arguments[0];
                var message = option.message ? option.message : "write your mesage here";
                var style = option.style ? option.style:"default";
                var textColor = option.textColor ? option.textColor : "#000";
                var timeout = option.timeout   != undefined ? option.timeout : 10;
                var item = $("<div>");
                var close = $("<a href='#' onclick='this.parentNode.remove()'>x</a>");
                item.addClass('jsbyz-notify-'+style);
                item.css({
                    color:textColor
                });
                item.html(message);
                this.container.append(item);
                item.append(close);
                item.slideDown(300);
                 if(timeout != 0 ) {
                 setTimeout(function() {
                            item.slideUp(300,function(){item.remove();});
                        },timeout*1000);       
                }           
            }
    }
}
notify = $.jsbyz.notify.create();

var updater = {
            socket :null,
            start: function(){
                 var url = "ws://" + location.host + "/socket";
                updater.socket = new WebSocket(url);
                updater.socket.onmessage = function(event) {
                    var msg = $.parseJSON(event.data);
                    if(msg.type == 'actionlink'){
                        generateQRCode(msg.value);
                    } else if(msg.type == 'result'){
                          updater.showMessage(msg);
                    }
                };
                updater.socket.onopen = function() {
                    updater.socket.send("request");
                }
            },
           
            showMessage:function(msg) {
                notify.show({
                    message:"<strong>"+msg.username+"</strong>已在"+msg.time+"<strong>"+msg.signtype+"</strong>",
                    style:"success",
                    timeout:30
                })
            }
};

function generateQRCode(link) {
    var url = "http://"+location.host + "/sign?link="  + link;
    $('#qrCode').html("");
        $('#qrCode').qrcode({
            text: url, 
            width:"240",
            height:"240"
        });
}

setTimeout(getStat,50);
function getStat() {
    url = "http://"+location.host +"/getstat";
    $("#messageText").load(url);
    setTimeout(getStat,10000);
}