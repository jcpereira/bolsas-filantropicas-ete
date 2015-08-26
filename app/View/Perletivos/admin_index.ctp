<h2>Periodos letivos</h2>
<a href="<? echo $this->Html->url("/admin/perletivos/create") ?>">Novo</a>

<table>
    <tr>
        <th>Ano</th>        
        <th>Ações</th>
    </tr>
    <? foreach($perletivos as $p){ ?>
    <tr>
        <th><? echo $p["Perletivo"]["ano"] ?></th>        
        <th>
            <a href="<? echo $this->Html->url("/admin/perletivos/edit/".$p["Perletivo"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/perletivos/delete/".$p["Perletivo"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>