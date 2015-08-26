<?php

/**
 * CakePHP Perletivos
 * @author João Carlos
 */
class PerletivosController extends AppController {

    public $uses = array("Perletivo");

    public function admin_index() {
        $this->set("perletivos", $this->paginate("Perletivo"));
    }

    public function admin_create() {        
        if ($this->request->is("POST")) {            
            if ($this->Perletivo->save($this->request->data)) {
                $this->Session->setFlash("Perletivo cadastrado com sucesso!");
                $this->redirect("/admin/perletivos");
            }
        }
    }

    public function admin_edit($id) {        
        if ($this->request->is("PUT")) {
            $this->request->data["Perletivo"]["id"] = $id;
            if ($this->Perletivo->save($this->request->data)) {
                $this->Session->setFlash("Perletivo alterado com sucesso!");
                $this->redirect("/admin/perletivos");
            }
        } else {
            $this->request->data = $this->Perletivo->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Perletivo->delete($id);
        $this->Session->setFlash("Perletivo excluído com sucesso!");
        $this->redirect("/admin/perletivos");
    }
}
