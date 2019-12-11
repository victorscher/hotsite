//Função para fazer requisição http, registrar os dados da conversão e disparar e-mails

cpf.addEventListener('blur', event => {
  fetch('/checkCpf', {
    method:'POST',
    body:JSON.stringify({
      cpf:cpf.value
    })
  }).then(response => {
    return response.json()
  }).then(json => {
    if(json != null){
      snackbar.innerHTML = "Este CPF já está cadastrado no sistema!";
      snackbar.className = "show";
      setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 2300);
      cpf.value = '';
      return true;
    }
  });
})

email.addEventListener('blur', event => {
  fetch('/checkEmail', {
    method:'POST',
    body:JSON.stringify({
      email:email.value
    })
  }).then(response => {
    return response.json()
  }).then(json => {
    if(json != null){
      snackbar.innerHTML = "Este E-Mail já está cadastrado no sistema!";
      snackbar.className = "show";
      setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 2300);
      email.value = '';
      return true;
    }
  });
})

form.addEventListener('submit', event => {
  event.preventDefault();
  
  if(validarCPF(cpf.value) && telefone.value != '' && validarEmail(email.value) && name.value != ''){
    fetch('/store', {
      method:'POST',
      body: JSON.stringify({
        name:name.value,
        email:email.value,
        telefone:telefone.value,
        cpf:cpf.value,
        unique_id:uniqueId.value,
        indicator:indicator.value
      })
    }).then(response => {
      return response.text();
    }).then(text => {
      let link = text;
      return link
    }).then((link) => {
      form.style.display = "none";
  
      linkInput.value = link;
      clipBoard.hidden = false;
      successMsg.style.display = "block";
    });

    fetch('/send', {
      method: 'POST',
      body: JSON.stringify({
        name:name.value,
        email:email.value,
        unique_id:uniqueId.value
      })
    });

    fetch('/indicator',{
      method: 'POST',
      body: JSON.stringify({
        indicator:indicator.value
      })
    }).then( response => {
      return response.json();
    }).then(indicatorJson => {
      return fetch('/send/indicator', {
        method:'POST',
        body:JSON.stringify({
          name:indicatorJson.name,
          email:indicatorJson.email,
          indicado:name.value
        })
      }).then( response => {
        return response.text();
      }).then( text => {
        console.log(text);
      });
    });

  }else{
    alert("Preencha formulário corretamente!");
  }

});