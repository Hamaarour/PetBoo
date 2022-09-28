
var form_1 = document.querySelector(".form_1");
var form_2 = document.querySelector(".form_2");
var form_3 = document.querySelector(".form_3");
var form_4 = document.querySelector(".form_4");


var form_1_btns = document.querySelector(".form_1_btns");
var form_2_btns = document.querySelector(".form_2_btns");
var form_3_btns = document.querySelector(".form_3_btns");
var form_4_btns = document.querySelector(".form_4_btns");



var form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");
var form_2_next_btn = document.querySelector(".form_2_btns .btn_next");
var form_3_back_btn = document.querySelector(".form_3_btns .btn_back");
var form_3_next_btn = document.querySelector(".form_3_btns .btn_next");
var form_4_back_btn = document.querySelector(".form_4_btns .btn_back");

var form_2_progessbar = document.querySelector(".form_2_progessbar");
var form_3_progessbar = document.querySelector(".form_3_progessbar");
var form_4_progessbar = document.querySelector(".form_4_progessbar");

var btn_done = document.querySelector(".btn_done");
var modal_wrapper = document.querySelector(".modal_wrapper");
var shadow = document.querySelector(".shadow");

const form = document.getElementById('form');
const titre = document.getElementById('titre');
const description = document.getElementById('text_ann');
var erreurTitre = document.querySelector(".erreur_input");
var erreurDescr = document.querySelector(".erreur_area");
var err = document.querySelector(".err");


form_1_next_btn.addEventListener("click", function(){
	form_1.style.display = "none";
	form_2.style.display = "block";

	form_1_btns.style.display = "none";
	form_2_btns.style.display = "flex";

	form_2_progessbar.classList.add("active");
});

form_2_back_btn.addEventListener("click", function(){
		form_1.style.display = "block";
		form_2.style.display = "none";

		form_1_btns.style.display = "flex";
		form_2_btns.style.display = "none";

		form_2_progessbar.classList.remove("active");
	
});

titre.addEventListener('change', (event) => {
	erreurTitre.style.visibility ="hidden";

});

description.addEventListener('change', (event) => {
	erreurDescr.style.visibility ="hidden";

});

form_2_next_btn.addEventListener("click", function(){
	const vtitre = titre.value.trim();
	const vdesc = description.value.trim();

	if(vtitre == '')
		erreurTitre.style.visibility ="visible";

	else if (vdesc == '')
		erreurDescr.style.visibility ="visible";

	else {
	form_2.style.display = "none";
	form_3.style.display = "block";

	form_3_btns.style.display = "flex";
	form_2_btns.style.display = "none";

	form_3_progessbar.classList.add("active");
	}
});

form_3_back_btn.addEventListener("click", function(){
	form_2.style.display = "block";
	form_3.style.display = "none";

	form_3_btns.style.display = "none";
	form_2_btns.style.display = "flex";

	form_3_progessbar.classList.remove("active");
});

form_3_next_btn.addEventListener("click", function(){
	form_3.style.display = "none";
	form_4.style.display = "block";

	form_4_btns.style.display = "flex";
	form_3_btns.style.display = "none";

	form_4_progessbar.classList.add("active");
});

form_4_back_btn.addEventListener("click", function(){
	form_3.style.display = "block";
	form_4.style.display = "none";

	form_4_btns.style.display = "none";
	form_3_btns.style.display = "flex";

	form_4_progessbar.classList.remove("active");
});

btn_done.addEventListener("click", function(){
	modal_wrapper.classList.add("active");
})

shadow.addEventListener("click", function(){
	window.location="PeetBoo_Mes_Annonce.php";
})


// Images 
let files = [], // will be store images
button = document.querySelector('.top button'), // uupload button
container = document.querySelector('.photos'), // container in which image will be insert
text = document.querySelector('.inner'), // inner text of form
browse = document.querySelector('.upload'), // text option fto run input
input = document.querySelector('.form_3 input'); // file input

browse.addEventListener('click', () => input.click());

// input change event
input.addEventListener('change', () => {
	
	let file = input.files;
	for (let i = 0; i < file.length; i++) {
	if (files.every(e => e.name !== file[i].name)&&files.length<4) 	files.push(file[i])

	else
		err.style.color="red";
	}
	// form.reset();
	showImages();
})

const showImages = () => {
	let images = '';
	files.forEach((e, i) => {
		images += `<div class="im">
    			<img src="${URL.createObjectURL(e)}" alt="im">
    			<span onclick="delImage(${i})">&times;</span>
    		</div>`
	})

	container.innerHTML = images;
} 

const delImage = index => {
	files.splice(index, 1)
	showImages()
} 

// drag and drop 
form.addEventListener('dragover', e => {
	e.preventDefault()

	form.classList.add('dragover')
})

form.addEventListener('dragleave', e => {
	e.preventDefault()

	form.classList.remove('dragover')
})

form.addEventListener('drop', e => {
	e.preventDefault()

    form.classList.remove('dragover')

	let file = e.dataTransfer.files;
	for (let i = 0; i < file.length; i++) {
		if (files.every(e => e.name !== file[i].name)) files.push(file[i])
	}
alert(files);
	showImages();
})

button.addEventListener('click', () => {
	let form = new FormData();
	files.forEach((e, i) => form.append(`file[${i}]`, e))

	
})