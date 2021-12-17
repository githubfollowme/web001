// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});

//從這裡切換到前台 比方x=index.php
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn()

	if(y)
	$(y).fadeIn()

	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}