<?php

/**
 * CakePHP Cursos
 * @author João Carlos
 */
class CursosController extends AppController {

    public $uses = array("Curso");

    public function admin_index() {
        $this->set("cursos", $this->paginate("Curso"));
    }

    public function admin_create() {        
        if ($this->request->is("POST")) {            
            if ($this->Curso->save($this->request->data)) {
                $this->Session->setFlash("Curso cadastrado com sucesso!");
                $this->redirect("/admin/cursos");
            }
        }
    }

    public function admin_edit($id) {        
        if ($this->request->is("PUT")) {
            $this->request->data["Curso"]["id"] = $id;
            if ($this->Curso->save($this->request->data)) {
                $this->Session->setFlash("Curso alterado com sucesso!");
                $this->redirect("/admin/cursos");
            }
        } else {
            $this->request->data = $this->Curso->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Curso->delete($id);
        $this->Session->setFlash("Curso excluído com sucesso!");
        $this->redirect("/admin/cursos");
    }
}
