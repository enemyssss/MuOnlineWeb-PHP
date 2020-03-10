$(function() {
$('#wrap').hide().fadeIn('slow');
$("#main").load("modules/news.php").hide().fadeIn("slow");
});

function web(link, content)
{
$('#main').fadeTo(0,0.0);
$('#main').empty().append('<center><img src="images/loading.gif"><br><center><b><br>Please wait loading...').fadeTo(0,1.0);
$('#title').empty().append(content);
 $.ajax(
 {
  url: link,
  success: function(msgc)
  {
   $('#main').fadeTo(0,0.0);
   $('#main').empty().append(msgc).fadeTo(0,1.0);
  }
 });
 return false;
}

function functions(func){
    var str = $('#'+func).serialize();
    $.ajax({
        url: 'includes/engine.php?function='+func,
        type: "POST",
        data: ''+str+'',
        success: function(msgc)
        {
            $('#'+func+'s').empty().append(""+msgc+"").hide().fadeIn("fast");
        }
    });

}


function news(content)
{

$("#news" +content).toggle('slow');

}

