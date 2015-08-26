<h2>Alterar periodo letivo</h2>
<? echo $this->Form->create("Perletivo") ?>  
<? echo $this->Form->input("ano") ?>
<? echo $this->Form->input("minimo",array("label"=>"Salário minimoo")) ?>
<? echo $this->Form->input("nome") ?>
<? echo $this->Form->input("ativo", array("type" => "select", "options" => array("1" => "Sim", "0" => "Não"))) ?>
<? echo $this->Form->input("descricao") ?>
<? echo $this->Form->end("Salvar") ?>