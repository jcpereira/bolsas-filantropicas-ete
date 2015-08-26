<h2>Bolsas</h2>
<a href="<? echo $this->Html->url("/admin/bolsas/create") ?>">Nova</a>

<table>
    <tr>
        <th>Nome</th>        
        <th>Ações</th>
    </tr>
    <? foreach($bolsas as $c){ ?>
    <tr>
        <th><? echo $c["Bolsa"]["nome"] ?></th>        
        <th>
            <a href="<? echo $this->Html->url("/admin/bolsas/edit/".$c["Bolsa"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/bolsas/delete/".$c["Bolsa"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>