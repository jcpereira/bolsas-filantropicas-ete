<h2>Usuários</h2>
<a href="<? echo $this->Html->url("/admin/usuarios/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Usuário</th>
        <th>Ações</th>
    </tr>
    <? foreach($usuarios as $u){ ?>
    <tr>
        <th><? echo $u["Usuario"]["nome"] ?></th>
        <th><? echo $u["Usuario"]["usuario"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/admin/usuarios/edit/".$u["Usuario"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/usuarios/delete/".$u["Usuario"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>