<?php

/**
 * CakePHP Empresas
 * @author João Carlos
 */
class EmpresasController extends AppController {

    public $uses = array("Empresa");

    public function admin_index() {
        $this->set("empresas", $this->paginate("Empresa"));
    }

    public function admin_create() {        
        if ($this->request->is("POST")) {
            $this->request->data["Empresa"]["senha"] = sha1("etefmc" . $this->request->data["Empresa"]["senha"]);
            if ($this->Empresa->save($this->request->data)) {
                $this->Session->setFlash("Empresa cadastrada com sucesso!");
                $this->redirect("/admin/empresas");
            }
        }
    }

    public function admin_edit($id) {        
        if ($this->request->is("PUT")) {
            $this->request->data["Empresa"]["id"] = $id;
            if ($this->Empresa->save($this->request->data)) {
                $this->Session->setFlash("Empresa alterada com sucesso!");
                $this->redirect("/admin/empresas");
            }
        } else {
            $this->request->data = $this->Empresa->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Empresa->delete($id);
        $this->Session->setFlash("Empresa excluída com sucesso!");
        $this->redirect("/admin/empresas");
    }
}
