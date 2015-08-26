<h2>Alterar empresa</h2>
<? echo $this->Form->create("Empresa") ?>  
<? echo $this->Form->input("nome") ?>
<? echo $this->Form->input("email", array("label" => "E-mail")) ?>
<? echo $this->Form->input("contratacao") ?>
<? echo $this->Form->input("nascimento") ?>
<? echo $this->Form->input("telefone") ?>
<? echo $this->Form->input("cep", array("label" => "CEP")) ?>
<? echo $this->Form->input("rua") ?>
<? echo $this->Form->input("numero") ?>
<? echo $this->Form->input("complemento") ?>
<? echo $this->Form->input("bairro") ?>
<? echo $this->Form->input("cidade") ?>
<? echo $this->Form->input("estado") ?>
<? echo $this->Form->end("Salvar") ?>
