<h2>Novo aluno</h2>
<? echo $this->Form->create("Aluno") ?>  
<? echo $this->Form->input("nome") ?>
<? echo $this->Form->input("descricao") ?>
<? echo $this->Form->input("filho_funcionario", array("type" => "select", "options" => array("1" => "Sim", "0" => "Não"), "label" => "Filho de Funcionário")) ?>
<? echo $this->Form->input("ano_ingresso") ?>
<? echo $this->Form->input("usuario_id", array("label" => "Usuário")) ?>
<? echo $this->Form->input("email", array("label" => "E-mail")) ?>
<? echo $this->Form->input("cpf", array("label" => "CPF")) ?>
<? echo $this->Form->input("identidade") ?>
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
