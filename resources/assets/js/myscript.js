//
// alert("fdsf");
// function buttonClicked()
// {
//
//     var arr=$('input:checkbox:checked').map(function() {return this.value ;}).get();
//     $('#arrayOfids').attr('value',arr);
//     alert($('#arrayOfids').attr('value'));
//
// }
/**
 * Created by snemesh on 3/22/17.
 */


$(":checkbox").change(function(){
    var arr=$('input:checkbox:checked').map(function() {return this.value ;}).get();
    $('#arrayOfids').attr('value',arr);
    //alert($('#arrayOfids').attr('value'));
});

$("#checkid").bind('click', function(){
    var arr=$('input:checkbox:checked').map(function() {return this.value ;}).get();
    $('#arrayOfids').attr('value',arr);
    //alert($('#arrayOfids').attr('value'));
});


$('#checkid1').bind('mouseup', function(){

//    alert($('#arrayOfids').attr('value'));

});