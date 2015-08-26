<?php

/**
 * CakePHP Escolaridades
 * @author João Carlos
 */
class EscolaridadesController extends AppController {

    public $uses = array("Escolaridade");

    public function admin_index() {
        $this->set("escolaridades", $this->paginate("Escolaridade"));
    }

    public function admin_create() {        
        if ($this->request->is("POST")) {
            $this->request->data["Escolaridade"]["senha"] = sha1("etefmc" . $this->request->data["Escolaridade"]["senha"]);
            if ($this->Escolaridade->save($this->request->data)) {
                $this->Session->setFlash("Escolaridade cadastrada com sucesso!");
                $this->redirect("/admin/escolaridades");
            }
        }
    }

    public function admin_edit($id) {        
        if ($this->request->is("PUT")) {
            $this->request->data["Escolaridade"]["id"] = $id;
            if ($this->Escolaridade->save($this->request->data)) {
                $this->Session->setFlash("Escolaridade alterada com sucesso!");
                $this->redirect("/admin/escolaridades");
            }
        } else {
            $this->request->data = $this->Escolaridade->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Escolaridade->delete($id);
        $this->Session->setFlash("Escolaridade excluída com sucesso!");
        $this->redirect("/admin/escolaridades");
    }
}
