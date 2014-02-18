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