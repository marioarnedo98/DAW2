function loadData() {
  var ciudad = $('#city').val();
  $.getJSON("https://api.nytimes.com/svc/search/v2/articlesearch.json?q="+ciudad+"&sort=oldest&api-key=as3bBfMGaz80iIhuGlzO1dAQAn6l8CzL", function(data){
    $.each(data, function(key, val){
      if(key == "response"){
        $("#nytimes-articles").empty();
        $('#nytimes-header').empty();
        $('#nytimes-header').text("New York Times Talks about "+ciudad);
        console.log(val['docs']);
        for(var n=0; n<val['docs'].length; n++){
          $("#nytimes-articles").append('<li class="article"><a href="' + val['docs'][n]['web_url'] + '">' + val['docs'][n]['headline']['main'] + '</a><p>' + val['docs'][n]['snippet']+'</p></li>')
        }
      }
    })
  })
  $.ajax({
    url: "https://en.wikipedia.org/w/api.php?action=opensearch&format=json&search="+ciudad+"&limit=6&suggest=1&redirects=return&callback=WikiCallBack",
    jsonp: "callback",
    dataType: "jsonp",
    success: function (response) {
      $("#wikipedia-links").empty();
      var noticiaswiki=[];
      var htmlwiki={
        'url':[],
        'title':[]
      };
      for (var i = 0; i < response.length; i++){
        noticiaswiki=response[i];
        for(var j =0; j<noticiaswiki.length; j++){
            if(i==3){
              htmlwiki['url'].push(noticiaswiki[j]);
            }
            if(i==1){
              htmlwiki['title'].push(noticiaswiki[j]);
            }
        }
      }
      console.log(htmlwiki);
      for(var x=0; x<htmlwiki['title'].length; x++){
        $("#wikipedia-links").append('<li><a href="'+htmlwiki['url'][x]+'">'+htmlwiki['title'][x]+'</li>');
      }
    }
  });
};

$('#submit-btn').on('click',function(){
  loadData();
});
  function ee() {
      var calle = $('#street').val();
      var ciudad = $('#city').val();
      $('#greeting').empty();
      $('#greeting').html("<h2 class='greeting'>So, you want to live at " + calle + " , " + ciudad);
      if (calle == "" && ciudad == "") {
        $('#greeting').empty();
        $('#greeting').html("<h2 class='greeting'>Where do you want to live?");
      }
  }
$('#street').keyup(function () {
  ee();
})

$('#city').keyup(function () {
 ee();
})
