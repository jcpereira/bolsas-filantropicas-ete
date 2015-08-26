
<? echo $this->Form->create("Usuario") ?>
<? echo $this->Form->input("usuario",array("label"=>"Email/Senha")) ?>
<? echo $this->Form->input("senha", array("type"=>"password")) ?>
<? echo $this->Form->end("Entrar") ?>
