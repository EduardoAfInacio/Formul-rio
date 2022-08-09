<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
  if(empty($_POST['nome'])){
    $erro_nome = 'Nome não preenchido.';
  }else{
    $nome = limparPost($_POST['nome']);
    if(!preg_match("/^[a-z-' áéíóúãâôû]*$/i", $nome)){
      $erro_nome = 'São aceitos apenas letras e espaços.';
    }
  }
  
  if(empty($_POST['email'])){
    $erro_email = 'E-mail não preenchido.';
  }else{
    $email= limparPost($_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $erro_email = 'E-mail inválido.';
    }
  }

  if(empty($_POST['telefone'])){
    $erro_telefone = 'Informe seu telefone.';
  }else{
    $telefone = limparPost($_POST['telefone']);
    $telefone = str_replace(' ', '', $telefone);
    if(!preg_match("/^[0-9 ]*$/",$telefone)){
      $erro_telefone = 'São aceitos apenas números.';
    }elseif(strlen($telefone)!=11 && strlen($telefone)!=10){
      $erro_telefone = 'Máximo 11 caracteres(ddd e 9 inclusos). Exemplo: 61922220000';
    }
  }
  
  if(empty($_POST['genero'])){
    $erro_genero = 'Selecione o seu gênero.';
  }else{
    $genero=limparPost($_POST['genero']);
  }
  
  if($_POST['curso']==''){
    $erro_curso = 'Selecione um curso.';
  }else{
    $curso=limparPost($_POST['curso']);
  }

  if(!$_POST['data_nascimento']){
    $erro_data = 'Informe sua data de nascimento.';
  }else{
    $data = limparPost($_POST['data_nascimento']);
  }
  
  if(empty($_POST['cidade'])){
    $erro_cidade = 'Informe sua cidade.';
  }else{
    $cidade = limparPost($_POST['cidade']);
    if(!preg_match("/^[a-zA-Z-' áéíóúãâôû]*$/",$cidade)){
      $erro_cidade = 'São aceitos apenas letras e espaços.';
    }
  }

  if(empty($_POST['estado'])){
    $erro_estado = 'Informe seu estado.';
  }else{
    $estado = limparPost($_POST['estado']);
    if(!preg_match("/^[a-zA-Z-' áéíóúãâôû]*$/",$estado)){
      $erro_estado = 'São aceitos apenas letras e espaços.';
    }
  }

  if(empty($_POST['endereço'])){
    $erro_endereco = 'Informe seu endereço.';
  }else{
    $endereco = limparPost($_POST['endereço']);
    if(!preg_match("/^[0-9a-zA-Z-' áéíóúãâôû]*$/",$endereco)){
      $erro_endereco = 'São aceitos apenas letras e espaços.';
    }
  }
  
}

function limparPost($variavel){
  $variavel = trim($variavel);
  $variavel = stripslashes($variavel);
  $variavel = htmlspecialchars($variavel);
    return $variavel;
}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Formulário</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class='box'>
    <form method='post'>
      <fieldset>
        <legend><b>Formulário de Cadastro</b></b></legend>
        <div class='inputBox'>
          <input type='text' <?php if(isset($_POST['nome'])){echo "value='".$_POST['nome']."'";} ?>name='nome' id='nome' class ='inputUser' >
          <label for='nome' class='labelInput'>Nome Completo</label>
          <br>
          <span class='erro'><?php echo $erro_nome;?></span>
        </div>
        <br>
        <div class='inputBox'>
          <input type='text' <?php if(isset($_POST['email'])){echo "value='".$_POST['email']."'";} ?> name='email' id='email' class="inputUser" >
          <label for='email' class='labelInput'>E-mail</label>
          <br>
          <span class='erro'><?php echo $erro_email;?></span>
        </div>
        <br>
        <div class='inputBox'>
          <input type='tel' <?php if(isset($_POST['telefone'])){echo "value='".$_POST['telefone']."'";} ?> name='telefone' id='telefone' class='inputUser' >
          <label for='telefone' class='labelInput'>Telefone</label>
          <br>
          <span class='erro'><?php echo $erro_telefone;?></span>
        </div>
        <p id='sexo'>Sexo:</p>
        <input type='radio' <?php if(isset($_POST['genero'])){if($_POST['genero']=='feminino'){?> checked <?php }} ?> id='feminino' name='genero' value="feminino" >
        <label for='feminino' class='generoClasse'>Feminino</label>
        <br>
        <input type='radio' <?php if(isset($_POST['genero'])){if($_POST['genero']=='masculino'){?> checked <?php }} ?>  id='masculino' name='genero' value='masculino' >
        <label for='masculino' class='generoClasse'>Masculino</label>
        <br>
        <input type='radio' <?php if(isset($_POST['genero'])){if($_POST['genero']=='outros'){?> checked <?php }} ?>  id='outros' name='genero' value='outros' >
        <label for='outros' class='generoClasse'>Outros</label>
        <br>
        <span class='erro'><?php echo $erro_genero;?></span>
        <br>
        <br>
        <label for='curso' class='selecionarCurso'>Selecione seu curso: </label>
        <br>
        <br>
        <select name='curso' id='curso' >
          <option <?php if(isset($_POST['curso'])){if($S_POST['curso']!=''){"value='".$_POST['curso']."'";}}else{?>value=''<?php } ?> disabled selected></option>
          <optgroup label='Engenharias'>
            <option value='Engenharia da Computação' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Engenharia da Computação'){?> selected <?php }} ?>>Engenharia da Computação</option>
            <option value='Engenharia Elétrica' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Engenharia Elétrica'){?> selected <?php }} ?>>Engenharia Elétrica</option>
            <option value='Engenharia Mecatrônica' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Engenharia Mecatrônica'){?> selected <?php }} ?>>Engenharia Mecatrônica</option>
            <option value='Engenharia Mecânica' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Engenharia Mecânica'){?> selected <?php }} ?>>Engenharia Mecânica</option>
          </optgroup>
          <optgroup label='Outros aceitos'>
            <option value='Medicina' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Medicina'){?>selected<?php }} ?>>Medicina</option>
            <option value='Direito' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Direito'){?>selected<?php }} ?>>Direito</option>
            <option value='Física' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Física'){?>selected<?php }} ?>>Física</option>
            <option value='Matemática' <?php if(isset($_POST['curso'])){if($_POST['curso']=='Matemática'){?>selected<?php }} ?>>Matemática</option>
          </optgroup>
        </select>
        <br>
        <span class='erro'><?php echo $erro_curso;?></span>
        <br>
        <br>
        <label for='data_nascimento'><b>Data de nascimento:</b></label>
        <input type='date' <?php if(isset($_POST['data_nascimento'])){echo "value='".$_POST['data_nascimento']."'";} ?> name='data_nascimento' id='data_nascimento' >
        <br>
        <span class='erro'><?php echo $erro_data;?></span>
        <br>
        <br>
        <div class='inputBox'>
          <input type='text' <?php if(isset($_POST['cidade'])){echo "value='".$_POST['cidade']."'";} ?> name='cidade' id='cidade' class ='inputUser' >
          <label for='cidade' class='labelInput'>Cidade</label>
          <br>
          <span class='erro'><?php echo $erro_cidade;?></span>
        </div>
        <br>
        <div class='inputBox'>
          <input type='text' <?php if(isset($_POST['estado'])){echo "value='".$_POST['estado']."'";} ?> name='estado' id='estado' class='inputUser' >
          <label for='estado' class='labelInput'>Estado</label>
          <br>
          <span class='erro'><?php echo $erro_estado;?></span>
        </div>
        <br>
        <div class='inputBox'>
          <input type='text' <?php if(isset($_POST['endereço'])){echo "value='".$_POST['endereço']."'";} ?> name='endereço' id='endereço' class='inputUser' >
          <label for='endereço' class='labelInput'>Endereço</label>
          <br>
          <span class='erro'><?php echo $erro_endereco;?></span>
        </div>
        <br>
        <input type='submit' name='submit' id='submit'>
      </fieldset>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>