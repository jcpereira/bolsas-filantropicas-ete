<h2>Parentescos</h2>
<a href="<? echo $this->Html->url("/admin/parentescos/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>        
        <th>Ações</th>
    </tr>
    <? foreach($parentescos as $p){ ?>
    <tr>
        <th><? echo $p["Parentesco"]["nome"] ?></th>        
        <th>
            <a href="<? echo $this->Html->url("/admin/parentescos/edit/".$p["Parentesco"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/parentescos/delete/".$p["Parentesco"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>