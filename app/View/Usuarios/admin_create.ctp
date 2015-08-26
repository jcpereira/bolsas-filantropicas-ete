<h2>Novo usuário</h2>
<? echo $this->Form->create("Usuario") ?>  
<? echo $this->Form->input("nome") ?>
<? echo $this->Form->input("usuario") ?>
<? echo $this->Form->input("tipo", array("type"=>"select","options"=>array("0"=>"Administrador","1"=>"Funcionario","2"=>"Aluno"),"label"=>"Tipo")) ?>
<? echo $this->Form->input("email", array("label"=>"E-mail:")) ?>
<? echo $this->Form->input("senha", array("label"=>"Senha:", "type"=>"password")) ?>
<? echo $this->Form->end("Salvar") ?>
