$(function(){
    $('confirmation').on('click', 'button',function(){
        $.ajax('confirmation.html',{
            timeout: 3000,
            success: function(response){
                $('ticket').html(response).slideDown();
            },
            //manejar errores en AJAX:
            error: function(xhr){
                $('ticket').html(xhr.responseText).slideDown();
            }
        });
    });
    $('ticket').on('click', '.view-boarding-pass', function(e){
        e.preventDefault();
        $('.view-boarding-pass').hide();
        $('.boarding-pass').show();
    })
})
/*
La opción xhr le permite definir su propia devolución de llamada
 para crear el objeto XMLHttpRequest que se utilizará en el ajax ()
*/