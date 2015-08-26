<h2>Escolaridades</h2>
<a href="<? echo $this->Html->url("/admin/escolaridades/create") ?>">Nova</a>

<table>
    <tr>
        <th>Nome</th>        
        <th>Ações</th>
    </tr>
    <? foreach($escolaridades as $e){ ?>
    <tr>
        <th><? echo $e["Escolaridade"]["nome"] ?></th>        
        <th>
            <a href="<? echo $this->Html->url("/admin/escolaridades/edit/".$e["Escolaridade"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/escolaridades/delete/".$e["Escolaridade"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>