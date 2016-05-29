$(document).ready(function(){

	var estaVazio = false;

	$('#recaptcha').mouseover(function(event){
		event.preventDefault();
		// alert("Ok, blezaaasas certo!!");

		estaVazio = true;

		if (estaVazio) {
			$('#btn-ir').attr('disabled', 'disabled');
		}else{
			$('#btn-ir').removeAttr('disabled');
		}

	});


});


/*

$('#ir').click(function(event){

		if(vcRecaptchaService.getResponse() === ""){ //if string is empty
			alert("Please resolve the captcha and submit!");
		}else {
			alert("Certo");
		}


$('#myform > input').on('input', function () {
			var empty = false;
			$('form > input, form > select').each(function () {
				if ($(this).val() == '') {
					empty = true;
				}
			});

			if (empty) {
				$('#register').attr('disabled', 'disabled');
			} else {
				$('#register').removeAttr('disabled');
			}
		});






function habilitaBtn () {

		alert("allooow");

		if(!document.getElementById('recaptcha')){
			document.getElementById('ir').disabled=true;
		}else{
			document.getElementById('ir').disabled=false;
		}

		$("#btn-ir").removeClass(".disabled");
	}


if(op == "--")
{
	if(!document.getElementById('avancar').disabled) document.getElementById('avancar').disabled=true;
}

else if(op == "FUNCIONARIO1")
{
	if(document.getElementById('avancar').disabled) document.getElementById('avancar').disabled=false;
}



if(vcRecaptchaService.getResponse() === ""){ //if string is empty
	alert("Please resolve the captcha and submit!")
}else {
    var post_data = {  //prepare payload for request
    	'name':vm.name,
    	'email':vm.email,
    	'password':vm.password,
        'g-recaptcha-response':vcRecaptchaService.getResponse()  //send g-captcah-reponse to our server
    }

}

$(document).ready(function(){
	initialize();

	/*
	Esconder a div ".apresenta" após clicar em "Conheça agora" e chama a div filtrosMapa

	$('#conhecaAgora').click(function(event){
		event.preventDefault();
		$(".apresenta").hide(1200);
		$("#mapa").css("height","523px");
		$(".filtrosMapa").show(1200);
		carregarPontos();
	});
}); */