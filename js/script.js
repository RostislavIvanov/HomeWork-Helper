//поиск элемента по ID
let radio1 = document.getElementById('radio-1');
let radio2 = document.getElementById('radio-2');
let radio3 = document.getElementById('radio-3');
//создание элемента input
let form_subject = document.createElement('input');
let form_service = document.createElement('input');

//поиск элемента с классом forjs
let element = document.querySelector('.forjs');

function addForm(form, metka, placeholder, type, name){
	form.setAttribute('placeholder', `${placeholder}`);
	form.setAttribute('type', `${type}`);
	form.setAttribute('name', `${name}`);
	form.setAttribute('value', '');
	form.classList.add('exist');
	metka.before(form);
}

radio2.onclick = () =>{
	if (!form_subject.classList.contains('exist')) {
		addForm(form_subject, element, 'Choose the subject you prefer', 'text', 'subject');
	}
	if (!form_service.classList.contains('exist')) {
		addForm(form_service, element, 'Choose your service', 'text', 'service');
	}
	if (form_subject.classList.contains('invisible') || form_service.classList.contains('invisible')) {
		form_subject.classList.remove('invisible');
		form_service.classList.remove('invisible');
	}
}

radio1.onclick = () =>{
	form_subject.classList.remove('exist');
	form_service.classList.remove('exist');
	form_subject.classList.add('invisible');
	form_service.classList.add('invisible');
}

radio3.onclick = () =>{
	if (!form_subject.classList.contains('exist')){
		addForm(form_subject, element, 'Choose the subject you prefer', 'text', 'subject');
	}
	if (form_subject.classList.contains('invisible')) {
		form_subject.classList.remove('invisible');
	}
	form_service.classList.add('invisible');
}




