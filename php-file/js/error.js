const errors = document.querySelectorAll(".error");

const autoDisplayToNone= (element,sec)=>{
	let mysec= 1;
	let ok = 1;
	let clear;
	clear = setInterval(()=>{
						console.log(mysec);
						if (sec == mysec) {
							ok=0;
							console.log('done');
							// element.style  = "display:none;";
							element.classList.add("errDisNone");
							clearInterval(clear);

						}
						mysec++;
					},1000);

			
}

errors.forEach((error)=>{
	autoDisplayToNone(error,6);
})




