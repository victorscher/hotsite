//Função para fazer requisição http, registrar os dados da conversão e disparar e-mails
let validToken;
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
      name.hidden = true;
      email.hidden = true;
      telefone.hidden = true;
      cpf.hidden = true;
      btnSubmit.hidden =true;
  
      linkInput.value = link;
      linkInput.hidden = false;
      btnPaste.hidden = false;
      successMsg.hidden = false;
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