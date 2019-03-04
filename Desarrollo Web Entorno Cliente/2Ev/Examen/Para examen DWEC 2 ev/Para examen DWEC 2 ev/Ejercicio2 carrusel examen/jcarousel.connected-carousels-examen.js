(function($) {
    // This is the connector function.
    // It connects one item from the navigation carousel to one item from the
    // stage carousel.
    // The default behaviour is, to connect items with the same index from both
    // carousels. This might _not_ work with circular carousels!
    var connector = function(itemNavigation, carouselStage) {
        return carouselStage.jcarousel('items').eq(itemNavigation.index());
    };

    $(function() {
        // Setup the carousels. Adjust the options for both carousels here.
        var carouselStage      = $('.carousel-stage').jcarousel();
        var carouselNavigation = $('.carousel-navigation').jcarousel();

        // We loop through the items of the navigation carousel and set it up
        // as a control for an item from the stage carousel.

        
        //1) Al carrusel de navegacion, le aplico el método jcarousel('items') y ahora para cada uno de ellos
        //que se ejecute la función anónima: 
        carouselNavigation.jcarousel('items').each(function() {
        // 2) Crear una variable llamada item que contenga el objeto actual
           var item= $(this);

            // This is where we actually connect to items.
        // 3) Crear una variable llamada target asignandole como valor la llamada a la funcion connector con la variable item y con la variable
             // carouselStage
            var target= connector(item,carouselStage);

            item
                .on('jcarouselcontrol:active', function() {
                    carouselNavigation.jcarousel('scrollIntoView', this);
                    item.addClass('active');
                })
                .on('jcarouselcontrol:inactive', function() {
        //  4) Aplicar a item el método para borrar la clase con el parámetro en 'active'
                 item.removeClass('active');
                })
                .jcarouselControl({
                    target: target,
                    carousel: carouselStage
                });
        });

        // Setup controls for the stage carousel
        $('.prev-stage')
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .jcarouselControl({
        // 5) Restar 1 al target
                target : '-=1'
            });

        $('.next-stage')
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });

        // Setup controls for the navigation carousel
        // 6) Seleccionar todos los elementos de clase prev-navigation
       $('.prev-navigation')
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .jcarouselControl({
        // 7) Restar 1 al target
        target : '-=1'
            });
        // 8) Seleccionar todos los elementos de clase next-navigation
        $('.next-navigation')
            .on('jcarouselcontrol:inactive', function() {
        // 9) Seleccionar el objeto actual y añadirle la clase 'inactive'
        $(this).addClass('inactive');
            })
            .on('jcarouselcontrol:active', function() {

         // 10) Seleccionar el objeto actual y borrarle la clase 'inactive'  
         $(this).removeClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });
    });
})(jQuery);