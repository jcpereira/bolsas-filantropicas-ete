<?php

/**
 * CakePHP Bolsas
 * @author João Carlos
 */
class BolsasController extends AppController {

    public $uses = array("Bolsa");

    public function admin_index() {
        $this->set("bolsas", $this->paginate("Bolsa"));
    }

    public function admin_create() {        
        if ($this->request->is("POST")) {
            $this->request->data["Bolsa"]["senha"] = sha1("etefmc" . $this->request->data["Bolsa"]["senha"]);
            if ($this->Bolsa->save($this->request->data)) {
                $this->Session->setFlash("Bolsa cadastrada com sucesso!");
                $this->redirect("/admin/bolsas");
            }
        }
    }

    public function admin_edit($id) {        
        if ($this->request->is("PUT")) {
            $this->request->data["Bolsa"]["id"] = $id;
            if ($this->Bolsa->save($this->request->data)) {
                $this->Session->setFlash("Bolsa alterada com sucesso!");
                $this->redirect("/admin/bolsas");
            }
        } else {
            $this->request->data = $this->Bolsa->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Bolsa->delete($id);
        $this->Session->setFlash("Bolsa excluída com sucesso!");
        $this->redirect("/admin/bolsas");
    }
}
