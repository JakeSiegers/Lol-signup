/**
 * Created by Jake on 2/13/14.
 */
$(function(){
    $("#lol_checkbox").bootstrapSwitch();
    $('#lol_checkbox').bootstrapSwitch('onText', 'Yeah!');
    $('#lol_checkbox').bootstrapSwitch('offText', 'Nope!');
    $('#lol_checkbox').bootstrapSwitch('size', 'large');
    $('#lol_checkbox').bootstrapSwitch('onColor', 'success');
    $('#lol_checkbox').bootstrapSwitch('offColor', 'danger');
});

function lol_submit(){
    lol_closeMessage("#lol_message");
    //console.log($('#lol_teamForm').serializeArray());
    $.ajax({
        url:""
        ,type:'post'
        ,data:$('#lol_teamForm').serializeArray()
        ,dataType:"json"
        ,timeout:10000
        ,success:function(reply){ //html request succeed?
            if(reply.success){
                if(reply.teamAdded){
                    lol_showHappyMessage(reply.message);
                }else{
                    lol_showErrorMessage(reply.message);
                }
            }else{
                lol_showErrorMessage("<p class='lead'>Whoops!</p> It appears sonething went wrong...");
            }
        }
        ,error:function(obj,error){
            lol_showErrorMessage("<p class='lead'>Whoops!</p> It appears sonething went wrong...");
        }
    });
}

function lol_showErrorMessage(messageContent,messageBoxId){
    var boxId = messageBoxId || false;
    var box;
    var closeParam;
    if(boxId === false){
        box = $('#lol_message');
        closeParam = '#lol_message';
        $('html, body').animate({scrollTop:0}, 500);
    }else{
        box = $(messageBoxId);
        closeParam = messageBoxId;
    }
    box.html('<div class="alert alert-danger" id="lol_messageInner"><button type="button" class="close" onclick="lol_closeMessage(\''+closeParam+'\')">&times;</button>'+messageContent+'</div>');
    box.animate({
        opacity:1
        ,height:$("#lol_messageInner").outerHeight()+"px"
    },500);
}
function lol_showHappyMessage(messageContent,messageBoxId){
    var boxId = messageBoxId || false;
    var box;
    var closeParam;
    if(boxId === false){
        box = $('#lol_message');
        closeParam = '#lol_message';
        $('html, body').animate({scrollTop:0}, 500);
    }else{
        box = $(messageBoxId);
        closeParam = messageBoxId;
    }
    box.html('<div class="alert alert-success" id="lol_messageInner"><button type="button" class="close" onclick="lol_closeMessage(\''+closeParam+'\')">&times;</button>'+messageContent+'</div>');
    box.animate({
        opacity:1
        ,height:$("#lol_messageInner").outerHeight()+"px"
    },500);
}
function lol_closeMessage(messageBoxId){
    var boxId = messageBoxId || false;
    if(boxId === false){
        var box = $('#message');
    }else{
        var box = $(messageBoxId);
    }
    box.animate({
        opacity:0
        ,height:"0px"

    },0);
}