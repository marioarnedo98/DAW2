// //Here you have to write your jQuery code
$(document).ready(function () {
    $('div.chapter a[href*="wikipedia"]').attr({
        rel: 'external',
        title: function (index) {
            return 'Learn more about ' + $(this).text() + ' at Wikipedia';
        },
        id: function (index) {
            return "wikipedia-" + index;
        }
    });
    var p = $('p')
    var back = $('<a href="#top">back to top</a>');
    var top = $('<a id="top"></a>');
    back.insertAfter(p);
    top.prependTo(p);

    var chapter = $('div.chapter');
    var notes = $('<ol id="notes"></ol>');
    notes.insertAfter(chapter);

    //    span.each(function( index ){
    //         $('<li></li>').appendTo(notes);
    //         $(this).clone().appendTo($( "li" ).last());
    //     });

    $('p span.footnote').each(function (index) {
        $('<sup>' + (index + 1) + '</sup>').insertBefore($(this));
        $($(this)).clone().appendTo(notes).wrap('<li></li>');
    });

});