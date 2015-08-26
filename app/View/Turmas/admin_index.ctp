<h2>Turmas</h2>
<a href="<? echo $this->Html->url("/admin/turmas/create") ?>">Nova</a>

<table>
    <tr>
        <th>Nome</th>        
        <th>Ações</th>
    </tr>
    <? foreach($turmas as $t){ ?>
    <tr>
        <th><? echo $t["Turma"]["nome"] ?></th>        
        <th>
            <a href="<? echo $this->Html->url("/admin/turmas/edit/".$t["Turma"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/turmas/delete/".$t["Turma"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>