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
		lol_submitTeam();
	});

	$('#lol_soloForm').submit(function(event){
		event.preventDefault();
		lol_submitSolo();
	});
});

var runningAjax = false;

function lol_submitTeam(){
	if(runningAjax){
		return false;
	}

	$('.has-error').each(function() {
		$(this).removeClass("has-error");
	});

	$('.lol_emailLoaderTeam').html('<i class="fa fa-refresh fa-spin"></i>');

	lol_closeMessage("lol_messageSolo");
	lol_closeMessage("lol_messageTeam");
	runningAjax = true;
	$.ajax({
		url:"submitTeam"
		,type:'post'
		,data:$('#lol_teamForm').serializeArray()
		,dataType:"json"
		,timeout:10000
		,success:function(reply){ //html request succeed?
			if(reply.success){
				$('.lol_emailLoaderTeam').html('');
				if(reply.teamAdded){
					lol_showHappyMessage(reply.message,"lol_messageTeam");
					$('#lol_teamForm').each(function(){this.reset();});
				}else{
					lol_showErrorMessage(reply.message,"lol_messageTeam");
					for(var i in reply.failedFields){
						$('[wrapping="'+reply.failedFields[i]+'"]').addClass("has-error");
					}
				}
				runningAjax = false;
			}else{
				lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...","lol_messageTeam");
				runningAjax = false;
			}
		}
		,error:function(obj,error){
			lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...","lol_messageTeam");
			runningAjax = false;
		}
	});
}

function lol_submitSolo(){
	if(runningAjax){
		return false;
	}

	$('.has-error').each(function() {
		$(this).removeClass("has-error");
	});

	$('.lol_emailLoaderSolo').html('<i class="fa fa-refresh fa-spin"></i>');

	lol_closeMessage("lol_messageSolo");
	lol_closeMessage("lol_messageTeam");
	runningAjax = true;
	$.ajax({
		url:"submitSolo"
		,type:'post'
		,data:$('#lol_soloForm').serializeArray()
		,dataType:"json"
		,timeout:10000
		,success:function(reply){ //html request succeed?
			if(reply.success){
				$('.lol_emailLoaderSolo').html('');
				if(reply.teamAdded){
					lol_showHappyMessage(reply.message,"lol_messageSolo");
					$('#lol_soloForm').each(function(){this.reset();});
				}else{
					lol_showErrorMessage(reply.message,"lol_messageSolo");
					for(var i in reply.failedFields){
						$('[wrapping="'+reply.failedFields[i]+'"]').addClass("has-error");
					}
				}
				runningAjax = false;
			}else{
				lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...","lol_messageSolo");
				runningAjax = false;
			}
		}
		,error:function(obj,error){
			lol_showErrorMessage("<p class='lead'><b>Whoops!</b></p> It appears something went wrong...","lol_messageSolo");
			runningAjax = false;
		}
	});
}

function lol_showErrorMessage(messageContent,messageBoxId){
	var box = $("#"+messageBoxId);
	box.html('<div class="lol_emailErrorMessage" id="lol_messageInner'+messageBoxId+'">'+messageContent+'</div>');
	box.css({
		opacity:1
		,height:$("#lol_messageInner"+messageBoxId).outerHeight()+"px"
	},500);
}

function lol_showHappyMessage(messageContent,messageBoxId){
	var box = $("#"+messageBoxId);
	box.html('<div class="lol_emailHappyMessage" id="lol_messageInner'+messageBoxId+'">'+messageContent+'</div>');
	box.css({
		opacity:1
		,height:$("#lol_messageInner"+messageBoxId).outerHeight()+"px"
	},500);
}

function lol_closeMessage(messageBoxId){
	var box = $("#"+messageBoxId);
	box.css({
		opacity:0
		,height:"0px"
	},0);
}