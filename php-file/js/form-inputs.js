const imgInp =document.getElementById('imgInp');
const imgTag = document.getElementById("imgTag");
imgInp.addEventListener('change',(e)=>{
	const [file] = imgInp.files;
	if (file){
		imgTag.src = URL.createObjectURL(file)
	}
});