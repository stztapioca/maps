$(document).ready(function () {
  
        $(".cerca,.first,.last").click(function() {
//var parametro = '07_1';
var parametro = $(this).attr("id");
alert(parametro);

$.ajax({
type: "POST",
data: ({ ricette: parametro, start: 0}),
url: "ricette.php",
error: function() {
                $("#errors").html('Error submiting the form.');
            },
success: function(response){
$("#content").html(response);
}
});
//alert('fatto');
});



});





