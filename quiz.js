$(document).ready(function(){
var vals = [];
var selectedVal = "true";

$("input").attr('checked', false);
$("#next").hide();
$("p").hide();

var $checkes = $('input:checkbox[name="color[]"]').change(function(){
    vals = $checkes.filter(':checked').map(function(){
    return this.value;
	}).get();
});

$('input:radio[name="radio"]').change(function(){
	vals[0] = "value";
	selectedVal = $('input:radio[name="radio"]:checked').val();
});

	$("#submit").click(function(){
		//$("p").hide();
		
		if ((vals[0] == null) || (selectedVal == null))
		{
			$("p").hide();
			$("#selectAnswer").slideDown(250);
		}
		else
		{
			$("p").hide();
			if ( (vals[0] == "red" && vals[1] == "green" && vals[2] == "blue" && vals[3] != "orange") || (selectedVal == "false")){
				$("#correctAnswer").slideToggle(250);
			}
			else
			{
				$("#wrongAnswer").slideToggle(250);
			}
			$(this).unbind();
			$(this).hide();
			$("#next").show();
		}
	});

});