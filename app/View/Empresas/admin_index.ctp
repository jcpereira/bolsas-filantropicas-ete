<h2>Empresas</h2>
<a href="<? echo $this->Html->url("/admin/empresas/create") ?>">Nova</a>

<table>
    <tr>
        <th>Nome</th>        
        <th>Ações</th>
    </tr>
    <? foreach($empresas as $e){ ?>
    <tr>
        <th><? echo $e["Empresa"]["nome"] ?></th>        
        <th>
            <a href="<? echo $this->Html->url("/admin/empresas/edit/".$e["Empresa"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/empresas/delete/".$e["Empresa"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>