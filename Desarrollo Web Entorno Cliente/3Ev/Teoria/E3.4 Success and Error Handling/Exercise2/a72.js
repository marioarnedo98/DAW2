$(function() { 
    $('.confirmation').on('click', 'button', function() {
      $.ajax('confirmation.html', {
        timeout: 3000,
        success: function(response) {
          $('.ticket').html(response).slideDown();
        },
        error: function(request, errorType, errorMessage) {
          alert('Error: ' + errorType + ' with message: ' + errorMessage);
        },
        beforeSend: function() {
          $('.confirmation').addClass('is-loading');
        },
        complete: function() {
          $('.confirmation').removeClass('is-loading');
        }
      });
    });
    $('.ticket').on('click', '.view-boarding-pass', function(e) {
      e.preventDefault();
      $('.view-boarding-pass').hide();
      $('.boarding-pass').show();
    })
  });