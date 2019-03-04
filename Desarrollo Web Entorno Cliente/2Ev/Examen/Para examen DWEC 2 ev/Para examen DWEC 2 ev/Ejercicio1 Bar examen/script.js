
$('document').ready(function() {

    createGraph($('#grapher'));
    
    $('#graphButton').click(regraph);
    
    regraph();
});



function createGraph($element) {
    
    //Generaremos 5 barras
    var rowCount = 5;
    
    for (var i=0; i < rowCount; i++) {
        //Añadir al final del elemento $element lo indicado en el enunciado mediante jQuery.
        $element.append(
            $('<div>').append(
            $('<input>').attr({
                'type':'text',
                'size':3,
            }).addClass('barInput').val(50),
            $('<div>').addClass('barHolder').append(
            $('<div>').addClass('bar').width("50%"))),
        );
        
    }
}

// This function takes a text box as input and adjusts the bar graph. 
function useOneInput(index, el) {
    
    var $this = $(el);
    // var value = parseInt($this.val(),10);
    var value = $('.barInput').val();
    // var $bar = $this.siblings().find('.bar');
    var $bar =  $('.bar');
    // var maxWidth = $this.siblings('.barHolder').width();
    var maxWidth = $('.barHolder').width();
    var newWidth = percentToWidth(value,maxWidth);
    
    setBarWidth($bar,newWidth);
    $bar.off('click');
    
    addBarClickEvent($bar,value);    
}

function percentToWidth(percent,maxWidth) {
    if(isNaN(percent)==true || percent<0){
        percent=0;
        return percent;
    }
    if(percent>100){
        console.log(maxWidth);
        maxWidth=100;
            return maxWidth;
    }
    else{
        var newWidth=percent;
        return newWidth;
    }
    

}


function setBarWidth($bar,newWidth) {
    $($bar).width(newWidth+"%");
    
}


function regraph() {
    $('.barInput').each(function(index){
       useOneInput(index);
    })
    
}


function addBarClickEvent($bar,value) {
   $($bar).click(function(e){
       alert(value);
   })
}

