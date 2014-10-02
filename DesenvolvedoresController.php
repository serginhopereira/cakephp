<?php

class DesenvolvedoresController extends AppController {

    public $helpers = array ('Html','Form');
    public $name = 'Desenvolvedor';
    
    public function index() {
        $this->Desenvolvedor->recursive = 0;
        $this->set('desenvolvedores', $this->paginate());
    }

    function getSistemas(){
        $this->loadModel('Sistema');
        $sistemas = $this->Versao->Sistema->find('list', array('fields' => array('id', 'nome')));
        return $sistemas;
    }

    public function visualizar($id = null) {
        $this->Desenvolvedor->id = $id;
        if (!$this->Desenvolvedor->exists()) {
            throw new NotFoundException(__('Erro!'));
        }
        $this->set('desenvolvedor', $this->Desenvolvedor->read(null, $id));
    }

    public function adicionar() {
        if ($this->request->is('post')) {
            $this->Desenvolvedor->create();
            if ($this->Desenvolvedor->save($this->request->data)) {
                $this->Session->setFlash('<div class="alert alert-success">Desenvolvedor adicionado com sucesso!</div>');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function editar($id = null) {
        $this->Desenvolvedor->id = $id;
        if (!$this->Desenvolvedor->exists()) {
            throw new NotFoundException(__('Erro!'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Desenvolvedor->save($this->request->data)) {
                $this->Session->setFlash(__('<div class="alert alert-success">Desenvolvedor alterado com sucesso!</div>'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Falha ao salvar desenvolvedor. Por favor, tente novamente.'));
            }
        } else {
            $this->request->data = $this->Desenvolvedor->read(null, $id);
            unset($this->request->data['id']['senha']);
        }
    }

    public function deletar($id = null) {
        
        if ($this->Desenvolvedor->delete($id)) {
            
            $this->Session->setFlash('O desenvolvedor foi excluído.', 'flash_sucesso');
            
        } else {
            
            $this->Session->setFlash('O desenvolvedor não foi excluído.', 'flash_erro');

        }
        $this->redirect($this->request->referer());
        
    }

}
?>
