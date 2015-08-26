<?php

/**
 * CakePHP Alunos
 * @author João Carlos
 */
class AlunosController extends AppController {

    public $uses = array("Aluno", "Usuario");

    public function admin_index() {
        $this->set("alunos", $this->paginate("Aluno"));
    }

    public function admin_create() {
        $this->set("usuarios", $this->Usuario->find("list", array('conditions' => array('Usuario.tipo' => "2"))));
        if ($this->request->is("POST")) {
            if ($this->Aluno->save($this->request->data)) {
                $this->Session->setFlash("Aluno cadastrado com sucesso!");
                $this->redirect("/admin/alunos");
            }
        }
    }

    public function admin_edit($id) {
        $this->set("usuarios", $this->Usuario->find("list", array('conditions' => array('Usuario.tipo' => "2"))));
        if ($this->request->is("PUT")) {
            $this->request->data["Aluno"]["id"] = $id;
            if ($this->Aluno->save($this->request->data)) {
                $this->Session->setFlash("Aluno alterado com sucesso!");
                $this->redirect("/admin/alunos");
            }
        } else {
            $this->request->data = $this->Aluno->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Aluno->delete($id);
        $this->Session->setFlash("Aluno excluído com sucesso!");
        $this->redirect("/admin/alunos");
    }

}
