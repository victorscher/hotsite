<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Hot Site</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="ball"></div>
    <div class="main">
        <div><p>LP | CONVERSÃO</p></div>
        <div class="title">
            <h1>Lorem<br>
            <span class="bold">ipsum dolor</span><br>
            sit amet
            </h1>
        </div>
        <div class="successMsg" id="successMsg" hidden>
            <h2>Sucesso!</h2>
        </div>
        <div class="form">
            <form action="/store" method="POST" id="form">
                    <input id="name" type="text" name="name" placeholder="NOME">

                    <input id="email" type="email" name="email" placeholder="E-MAIL">

                    <input id="telefone" type="text" name="telefone" placeholder="TELEFONE" onkeydown="javascript: fMasc( this, mTel );" maxlength="14">

                    <input id="cpf" type="text" name="cpf" placeholder="CPF" onkeydown="javascript: fMasc( this, mCPF );" maxlength='14'>

                    <input id="uniqueId" hidden type="text" value="<?= str_replace('.', '',uniqid('id', true))?>">

                    <input id="indicator" hidden type="text" name="indicator" value="<?=$_GET['indicator']?>">

                    <button class="btn" id="btnSubmit" type="submit">CADASTRAR</button>

            </form>
            <div> 
                <input type="text" id="link" hidden>
                <button class="btn" id="btnPaste" hidden>COPIAR!</button>
            </div>
        </div>
        <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas, leo quis efficitur elementum</p></div>
    </div>
    <script src="js/getElements.js"></script>
    <script src="js/masks.js"></script>
    <script src="js/store.js"></script>
</body>
</html>