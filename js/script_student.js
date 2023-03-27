//student 							
let mark = document.querySelectorAll('.item-task__mark');

for (let i = 0; i < mark.length; i++) {
	if (Number(mark[i].innerHTML) < 4.5 && Number(mark[i].innerHTML) > 3.4) {
		mark[i].style.backgroundColor="#B5E61D";
	}
	else if (Number(mark[i].innerHTML) < 3.5 && Number(mark[i].innerHTML) > 2.4) {
		mark[i].style.backgroundColor="#FFC90E";
	}
	else if (Number(mark[i].innerHTML) < 2.5) {
		mark[i].style.backgroundColor="#B0001B";
	}
}



