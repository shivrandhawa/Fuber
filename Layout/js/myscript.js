
function addField(){
	var counter = 0;
	document.getElementById("add").onclick = function() {
		counter++;
    		var li = document.createElement("li");
    		var input = document.createElement("input");
    		input.setAttribute("type", "text");
    		input.setAttribute("name", "ingredient" + counter);
				input.setAttribute("id", "textBox" + counter);
    		li.appendChild(input);
    		document.getElementById("ingredientList").appendChild(li);
				document.getElementById("textBox" + counter).focus();
    		return false;
	};
};
