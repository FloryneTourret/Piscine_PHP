var todolist;
var cookies = [];

function gettodo()
{
	var newtodo = prompt("Ajouter une tâche ?", '');
	if (newtodo == '')
		return;
	else
		addnewtodo(newtodo);
}

function addnewtodo(newtodo)
{
	var div = document.createElement("div");
	div.innerHTML = newtodo;
	div.addEventListener("click", deletetodo);
	todolist.insertBefore(div, todolist.firstChild);
}

function deletetodo (){
	if (confirm("Supprimer une tâche ?"))
		this.parentElement.removeChild(this);
}

window.onload = function() {
	var newbutton = document.getElementById("new");
	newbutton.addEventListener("click", gettodo);
	todolist = document.getElementById("ft_list");
	oldcookies = document.cookie;
	console.log(oldcookies);
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
	var tosave = todolist.children;
	var savecookies = [];
	var i = 0;
	while (i < tosave.length)
	{
		savecookies.unshift(tosave[i].innerHTML);
		i++;
	}
	document.cookie = JSON.stringify(savecookies);
}