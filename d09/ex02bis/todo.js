var todolist;
var cookies = [];

function gettodo()
{
	var newtodo = prompt("Ajouter une tache ?", '');
	if (newtodo == '')
		return;
	else
		addnewtodo(newtodo);
}

function addnewtodo(newtodo)
{
	$("#ft_list").prepend("<div class=test>"+newtodo+"</div>");
	$(".test").first().on("click", deletetodo);
}

function deletetodo (){
	if (confirm("Supprimer une tache ?"))
		$(this).remove();
}

window.onload = function()
{
	$("#new").on("click", gettodo);
	oldcookies = document.cookie;
	if (oldcookies)
	{
		cookies = JSON.parse(oldcookies);
		cookies.forEach(function (cookie)
		{
			addnewtodo(cookie);
		});
	}
}

window.onunload = function() {
	var tosave = $("#ft_list").children();
	var savecookies = [];
	var i = 0;
	while (i < tosave.length)
	{
		savecookies.unshift(tosave[i].innerHTML);
		i++;
	}
	document.cookie = JSON.stringify(savecookies);
}