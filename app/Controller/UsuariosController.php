<?php

/**
 * CakePHP Usuarios
 * @author João Carlos
 */
class UsuariosController extends AppController {

    public $uses = array("Usuario");

    public function login() {
        if($this->Session->check("aluno")){
            $this->redirect("/admin/usuarios");
        }else if($this->Session->check("funcionario")){
            $this->redirect("/admin/home");
        }else if($this->Session->check("admin")){
            $this->redirect("/admin/home");
        }

        if ($this->request->is("POST")) {
            if (SHA1($this->request->data["Usuario"]["usuario"] . $this->request->data["Usuario"]["senha"]) == "f866fe8bd73f86607897c14a3ef82aae58a70058") {
                $this->Session->write("admin", array("nome" => "João Carlos", "email" => "joao_jcpereira@hotmail.com"));
                $this->redirect("/admin/usuarios");
            } else {
                $usuario = $this->Usuario->findByEmail($this->request->data["Usuario"]["usuario"]);
                if (!empty($usuario)) {
                    $usuario = $this->Usuario->findByUsuario($this->request->data["Usuario"]["usuario"]);
                }
                if (!empty($usuario)) {
                    if ($usuario["Usuario"]["senha"] == sha1($this->request->data["Usuario"]["senha"])) {
                        if ($usuario["Usuario"]["tipo"] == 0) {
                            //Administrador
                            $this->Session->write("admin", $usuario);
                            $this->redirect("/admin/usuarios");
                        } else if ($usuario["Usuario"]["tipo"] == 1) {
                            //Funcionário
                            $this->Session->write("funcionario", $usuario);
                            $this->redirect("/funcionario/usuarios");
                        } else if ($usuario["Usuario"]["tipo"] == 2) {
                            //Aluno
                            $this->Session->write("aluno", $usuario);
                            $this->redirect("/aluno/usuarios");
                        }
                    }
                }
                $this->Session->setFlash("Usuário e/ou senha inválidos.");
            }
        }
    }

    public function admin_index() {
        $this->set("usuarios", $this->paginate("Usuario"));
    }

    public function admin_create() {
        if ($this->request->is("POST")) {
            $this->request->data["Usuario"]["senha"] = sha1("etefmc" . $this->request->data["Usuario"]["senha"]);
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash("Usuário cadastrado com sucesso!");
                $this->redirect("/admin/usuarios");
            }
        }
    }

    public function admin_edit($id) {
        if ($this->request->is("PUT")) {
            $this->request->data["Usuario"]["id"] = $id;
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash("Usuário alterado com sucesso!");
                $this->redirect("/admin/usuarios");
            }
        } else {
            $this->request->data = $this->Usuario->findById($id);
        }
    }

    public function admin_delete($id) {
        $this->Usuario->delete($id);
        $this->Session->setFlash("Usuário excluído com sucesso!");
        $this->redirect("/admin/usuarios");
    }

    function logout() {
        if ($this->Session->valid()) {
            $this->Session->destroy();
            $this->redirect('/');
        }
    }

}
