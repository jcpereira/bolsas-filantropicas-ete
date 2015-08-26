<h2>Cursos</h2>
<a href="<? echo $this->Html->url("/admin/cursos/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>        
        <th>Ações</th>
    </tr>
    <? foreach($cursos as $c){ ?>
    <tr>
        <th><? echo $c["Curso"]["nome"] ?></th>        
        <th>
            <a href="<? echo $this->Html->url("/admin/cursos/edit/".$c["Curso"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/admin/cursos/delete/".$c["Curso"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>