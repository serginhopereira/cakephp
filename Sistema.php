class Sistema extends AppModel {
	public $name = 'Sistema';
	
	public $hasAndBelongsToMany = array(
        'Desenvolvedor' =>
            array(
                'className' => 'Desenvolvedor',
                'joinTable' => 'desenvolvedores_sistemas',
                'foreignKey' => 'sistema_id',
                'associationForeignKey' => 'desenvolvedor_id',
            )
    );
}

