function loadData() {
  var ciudad = $('#city').val();
  $.getJSON("https://api.nytimes.com/svc/search/v2/articlesearch.json?q="+ciudad+"&sort=oldest&api-key=as3bBfMGaz80iIhuGlzO1dAQAn6l8CzL", function(data){
    var items=[];
    
    $.each(data, function(key, val){
      items.push("<li id='"+key+"'>"+val+"</li>");
      if(key == "response"){
        //add funcionalidad
        console.log("vamos bn");
      }
    })
    // console.log(items);
  })
  var wikiRequestTimeOut= setTimeout(function(){
    $wikiElem.text("Error al obtener datos");
  })
  $.ajax({
    url: "https://en.wikipedia.org/w/api.php?action=opensearch&format=json&search="+ciudad+"&limit=6&suggest=1&redirects=return&callback=WikiCallBack",
    jsonp: "callback",
    dataType: "jsonp",
    success: function (response) {
      //add funcionalidad, necesitas la posicion 3 (links)y la posicion 1(titulo)
      console.log(response);
      clearTimeout(wikiRequestTimeOut);
    }
  });
};

$('#submit-btn').on('click',function(){
  loadData();
});
$('#street').keyup(function () {
  var calle = $('#street').val();
  var ciudad= $('#city').val();
  $('#greeting').empty();
  $('#greeting').html("<h2 class='greeting'>So, you want to live at "+calle+" , "+ciudad);
  if(calle=="" && ciudad==""){
     $('#greeting').empty();
     $('#greeting').html("<h2 class='greeting'>Where do you want to live?");
  }
})

$('#city').keyup(function () {
  var calle = $('#street').val();
  var ciudad = $('#city').val();
  $('#greeting').empty();
  $('#greeting').html("<h2 class='greeting'>So, you want to live at " + calle + " , " + ciudad);
  if (calle == "" && ciudad == "") {
    $('#greeting').empty();
    $('#greeting').html("<h2 class='greeting'>Where do you want to live?");
  }
})
