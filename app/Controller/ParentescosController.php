<?php

/**
 * CakePHP Parentescos
 * @author João Carlos
 */
class ParentescosController extends AppController {

    public $uses = array("Parentesco");

    public function admin_index() {
        $this->set("parentescos", $this->paginate("Parentesco"));
    }

    public function admin_create() {        
        if ($this->request->is("POST")) {            
            if ($this->Parentesco->save($this->request->data)) {
                $this->Session->setFlash("Parentesco cadastrado com sucesso!");
                $this->redirect("/admin/parentescos");
            }
        }
    }

    public function admin_edit($id) {        
        if ($this->request->is("PUT")) {
            $this->request->data["Parentesco"]["id"] = $id;
            if ($this->Parentesco->save($this->request->data)) {
                $this->Session->setFlash("Parentesco alterado com sucesso!");
                $this->redirect("/admin/parentescos");
            }
        } else {
            $this->request->data = $this->Parentesco->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Parentesco->delete($id);
        $this->Session->setFlash("Parentesco excluído com sucesso!");
        $this->redirect("/admin/parentescos");
    }
}
