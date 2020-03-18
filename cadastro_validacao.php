<link rel="stylesheet" type="text/css" href="/css/cadastro_validacao.css">

<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$conf_senha = $_POST['redigitar_senha'];

$erro_campos = false;
$erro_nome = false;
$erro_email = false;
$erro_senhas = false;
$tam_senha = false;
$tam_nome = false;
?>

<?php if (empty($nome) || empty($email) || empty($senha) || empty($conf_senha)): ?>
  <?php $erro_campos = true; ?>
  <?php include ('cadastro.html'); ?>  

  <div>
    <p>Preencha todos os campos!</p>
  </div>  

<?php endif ?>

<?php if (preg_match("/^[a-zA-Z0-9ç]+$/", $nome) == false): ?>
  <?php if ($erro_campos == false): ?>
    <?php $erro_nome = true; ?>
    <?php include ('cadastro.html'); ?>  

    <div>
      <p>Números, caracteres especiais, espaços e letras acentuadas não podem ser utilizados no campo de ID!</p>
    </div>

    <?php endif ?>
<?php endif ?>

<?php if (strrpos($email, "@") == false): ?>
  <?php if ($erro_campos == false && $erro_nome == false): ?>
    <?php $erro_email = true; ?>
    <?php include ('cadastro.html'); ?>  

    <div>
      <p>Insira um e-mail válido!</p>
    </div>

    <?php endif ?>
<?php endif ?>

<?php if (strlen($nome) > 64): ?>
  <?php if ($erro_campos == false && $erro_nome == false && $erro_email == false): ?>
    <?php $tam_nome = true; ?>
    <?php include ('cadastro.html'); ?>
 
    <div>
      <p>O ID deve conter no máximo 64 caracteres!</p>
    </div>

  <?php endif ?>
<?php endif ?>

<?php if (strlen($senha) < 8 || strlen($senha) > 16): ?>
  <?php if ($erro_campos == false && $erro_nome == false && $erro_email == false && $tam_nome == false): ?>
    <?php $tam_senha = true; ?>
    <?php include ('cadastro.html'); ?>
 
    <div>
      <p>A senha deve conter no mínimo 8 caracteres e no máximo 16!</p>
    </div>

  <?php endif ?>
<?php endif ?>

<?php if ($senha != $conf_senha): ?>
  <?php if ($erro_campos == false && $erro_nome == false && $erro_email == false && $tam_nome == false && $tam_senha == false): ?>
    <?php $erro_senhas = true; ?>
    <?php include ('cadastro.html'); ?>

    <div>
      <p>As senhas não coincidem!</p>
    </div>

    <?php endif ?>
<?php endif ?>

<?php if ($erro_campos == false && $erro_nome == false && $erro_email == false && $tam_nome == false && $tam_senha == false && $erro_senhas == false): ?>
  <?php include ('conf_cadastro.html'); ?>

<?php endif ?>
