<!-- File: /app/View/Sistemas/add.ctp -->
<?php //echo pr($desenvolvedoressistemas) ?>
<h3>Adicionar Sistema</h3>
<?php
echo $this->Form->create('Sistema');
echo $this->Form->input('nome', array('label' => 'Nome', 'type' => 'text'));
echo $this->Form->input('link', array('type' => 'url'), array('rows' => '1'));
echo $this->Form->input('tecnologia');
echo 'Desenvolvedor<br>'.$this->Form->select('desenvolvedores_id', $desenvolvedores, array('options' => 'nome'));
echo $this->Form->end('Cadastrar sistema');
echo "&nbsp;&nbsp;<small><a href=\"./\">voltar</a></small>";

?>
