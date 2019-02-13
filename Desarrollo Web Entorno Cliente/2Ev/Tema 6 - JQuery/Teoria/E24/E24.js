//Here you have to write your jQuery code
$(document).ready(function () {
    var dd = $('div.chapter a');
    dd.each(function (index) {
        var a = 0;
        if ($(this).attr("href").indexOf("en.wikipedia.org/wiki") != -1) {
            $('div.chapter a').attr({
                rel: 'external',
                title: function(){
                    var elementList = $("div.chapter a");
                    for (var i = 1; i <= elementList.length; i++) {
                        a++;
                        return 'learn more of ' + $(this).text() +' On wikipedia';
                    }
                },
                id: function () {
                    var elementList = $("div.chapter a");
                    for (var i = 1; i <= elementList.length; i++) {
                        a++;
                        return a;
                    }
                }

            })
        }
    })
   var BackToTop= $('<br><a href="#top">Back to top</a>');
    var idTop = $('<a id="top">');
    var texto= $('div.chapter p');
    $(texto).append(BackToTop);
    var xx= $('span.footnote');
    $('#footer').prepend( '<ol id="notes">' )
    xx.each(function(index){
        // alert($(this).text());
        var resultado = $('<sup><li>' + $(this).text()+'</li></sup>');
        $('#notes').prepend(resultado);
    })
     $('#notes').prepend("</ol>");


      
});