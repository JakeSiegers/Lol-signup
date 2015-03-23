/**
* Created by Jake on 2/13/14.
* Updated on 10/19/14
*/

$(function(){
/*
$("#lol_checkbox").bootstrapSwitch();
$('#lol_checkbox').bootstrapSwitch('onText', 'Yeah!');
$('#lol_checkbox').bootstrapSwitch('offText', 'Nope!');
$('#lol_checkbox').bootstrapSwitch('size', 'large');
$('#lol_checkbox').bootstrapSwitch('onColor', 'success');
$('#lol_checkbox').bootstrapSwitch('offColor', 'danger');
*/

$('#lol_teamForm').submit(function(event){
event.preventDefault();
lol_submit();
});
});

var runningAjax = false;

function lol_submit(){
if(runningAjax){
return false;
}

$('.has-error').each(function() {
$(this).removeClass("has-error");
});
$('.lol_emailLoader').html('<i class="fa fa-refresh fa-spin"></i>');

lol_closeMessage("#lol_message");
runningAjax = true;
$.ajax({
url:"submitTeam"
,type:'post'
,data:$('#lol_teamForm').serializeArray()
,dataType:"json"
,timeout:10000
,success:function(reply){ //html request succeed?
if(reply.success){
$('.lol_emailLoader').html('');
if(reply.teamAdded){
lol_showHappyMessage(reply.message);
$('#lol_teamForm').each(function(){this.reset();});
}else{
lol_showErrorMessage(reply.message);
for(var i in reply.failedFields){
$('[wrapping="'+reply.failedFields[i]+'"]').addClass("has-error");
}
}
runningAjax = false;
}else{
lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...");
runningAjax = false;
}
}
,error:function(obj,error){
lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...");
runningAjax = false;
}
});
}

function lol_updateTeams(){
$.ajax({
url:"submitTeam"
,type:'post'
,data:$('#lol_teamForm').serializeArray()
,dataType:"json"
,timeout:10000
,success:function(reply){ //html request succeed?
if(reply.success){
$('.lol_emailLoader').html('');
if(reply.teamAdded){
lol_showHappyMessage(reply.message);
$('#lol_teamForm').each(function(){this.reset();});
}else{
lol_showErrorMessage(reply.message);
for(var i in reply.failedFields){
$('[wrapping="'+reply.failedFields[i]+'"]').addClass("has-error");
}
}
runningAjax = false;
}else{
lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...");
runningAjax = false;
}
}
,error:function(obj,error){
lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...");
runningAjax = false;
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
//$('html, body').animate({scrollTop:0}, 500);
}else{
box = $(messageBoxId);
closeParam = messageBoxId;
}
box.html('<div class="lol_emailErrorMessage" id="lol_messageInner">'+messageContent+'</div>');
box.css({
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
//$('html, body').animate({scrollTop:0}, 500);
}else{
box = $(messageBoxId);
closeParam = messageBoxId;
}
box.html('<div class="lol_emailHappyMessage" id="lol_messageInner">'+messageContent+'</div>');
box.css({
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
box.css({
opacity:0
,height:"0px"

},0);
}