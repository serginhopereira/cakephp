<?php 
class SistemasController extends AppController {
	public $helpers = array ('Html','Form');
    public $name = 'Sistemas';


	function index(){
        $this->set('sistemas', $this->Sistema->find('all'));
	}

   function getDesenvolvedores(){
        $this->loadModel('Desenvolvedor');
        $desenvolvedores = $this->Sistema->Desenvolvedor->find('list', array('fields' => array('id', 'nome')));
        return $desenvolvedores;
    }

	public function view($id = null) {
        $desenvolvedores = $this->getDesenvolvedores();
        $this->set('desenvolvedores', $desenvolvedores);

        $this->Sistema->id = $id;
        $this->set('sistema', $this->Sistema->read());
    }

    public function adicionar(){
        $desenvolvedores = $this->getDesenvolvedores();
        $this->set('desenvolvedores', $desenvolvedores);

        if($this->request->is('post')){
            if($this->Sistema->save($this->request->data)) {
                $this->Session->setFlash('<span class="alert alert-success">Sistema salvo.</span>');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function editar($id = null) {
        $desenvolvedores = $this->getDesenvolvedores();
        $this->set('desenvolvedores', $desenvolvedores);

        $this->Sistema->id = $id;
        if($this->request->is('get')) {
            $this->request->data = $this->Sistema->read();
        } else {
            if($this->Sistema->save($this->request->data)){
                $this->Session->setFlash('Sistema atualizado.');
                $this->redirect(array('action' => 'index'));
            }
        }

    }
    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Sistema->delete($id)) {
            $this->Session->setFlash('Sistema deletado.');
            $this->redirect(array('action' => 'index'));
        }
    }


}

?>
