// Função para copiar link único

function copy() {
  var copyText = linkInput;
  copyText.select();
  document.execCommand("copy");
  linkInput.blur();
  snackbar.innerHTML = "Link copiado";
  snackbar.className = "show";
  setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 1500);
}

btnCopy.addEventListener("click", copy);


// Bootstrapper das mascaras

function fMasc(objeto,mascara) {
  obj=objeto
  masc=mascara
  setTimeout("fMascEx()",1)
}

function fMascEx() {
  obj.value=masc(obj.value)
}

// Mascaras

function mTel(tel) {
  tel=tel.replace(/\D/g,"")
  tel=tel.replace(/^(\d)/,"($1")
  tel=tel.replace(/(.{3})(\d)/,"$1)$2")
  if(tel.length == 9) {
    tel=tel.replace(/(.{1})$/,"-$1")
  } else if (tel.length == 10) {
    tel=tel.replace(/(.{2})$/,"-$1")
  } else if (tel.length == 11) {
    tel=tel.replace(/(.{3})$/,"-$1")
  } else if (tel.length == 12) {
    tel=tel.replace(/(.{4})$/,"-$1")
  } else if (tel.length > 12) {
    tel=tel.replace(/(.{4})$/,"-$1")
  }
  return tel;
}

function mCPF(cpf){
  cpf=cpf.replace(/\D/g,"")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
  return cpf
}

// Validações

function validarCPF(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			return false;		
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return true;   
}

function validarEmail(email) {
  usuario = email.substring(0, email.indexOf("@"));
  dominio = email.substring(email.indexOf("@")+ 1, email.length);
  if ((usuario.length >=1) &&
      (dominio.length >=3) && 
      (usuario.search("@")==-1) && 
      (dominio.search("@")==-1) &&
      (usuario.search(" ")==-1) && 
      (dominio.search(" ")==-1) &&
      (dominio.search(".")!=-1) &&      
      (dominio.indexOf(".") >=1)&& 
      (dominio.lastIndexOf(".") < dominio.length - 1)) {
        return true;
  }
  else{
    return false;
  }
}
