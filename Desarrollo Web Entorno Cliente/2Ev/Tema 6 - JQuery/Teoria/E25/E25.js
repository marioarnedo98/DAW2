//Here you have to write your jQuery code
$(document).ready(function () {
var $speech = $('div.speech');
$('#switcher button').click(function(){
    var num= parseFloat($speech.css('fontSize'));
    switch(this.id){
        case'switcher-large':
        num *=1.4;
        break;
        case'switcher-small':
        num= num/1.4;
        break;
        case 'switcher-default':
        num = 22;
        break;
    }
    
    $speech.css('fontSize',num+'px');
})
$('p').eq(2).hide();

$('a.more').click(function () {
    $('p').eq(2).show("slow");
    $(this).hide();
});

//show :  Display the matched elements.
//hide : Hide the matched elements.
})