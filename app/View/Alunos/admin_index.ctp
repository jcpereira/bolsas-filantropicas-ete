<h2>Aluno</h2>
<a href="<? echo $this->Html->url("/admin/alunos/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Matrícula</th>
        <th>Ações</th>
    </tr>
    <? foreach($alunos as $a){ ?>
    <tr>
        <th><? echo $a["Aluno"]["nome"] ?></th>
        <th><? echo $a["Aluno"]["matricula"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/admin/alunos/edit/".$a["Aluno"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/alunos/delete/".$a["Aluno"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>