<?php

/**
 * CakePHP Turmas
 * @author João Carlos
 */
class TurmasController extends AppController {

    public $uses = array("Turma");

    public function admin_index() {
        $this->set("turmas", $this->paginate("Turma"));
    }

    public function admin_create() {        
        if ($this->request->is("POST")) {
            $this->request->data["Turma"]["senha"] = sha1("etefmc" . $this->request->data["Turma"]["senha"]);
            if ($this->Turma->save($this->request->data)) {
                $this->Session->setFlash("Turma cadastrada com sucesso!");
                $this->redirect("/admin/turmas");
            }
        }
    }

    public function admin_edit($id) {        
        if ($this->request->is("PUT")) {
            $this->request->data["Turma"]["id"] = $id;
            if ($this->Turma->save($this->request->data)) {
                $this->Session->setFlash("Turma alterada com sucesso!");
                $this->redirect("/admin/turmas");
            }
        } else {
            $this->request->data = $this->Turma->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Turma->delete($id);
        $this->Session->setFlash("Turma excluída com sucesso!");
        $this->redirect("/admin/turmas");
    }
}
