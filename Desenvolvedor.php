class Desenvolvedor extends AppModel {

public $hasAndBelongsToMany = array(
        'Sistema' =>
            array(
                'className' => 'Sistema',
                'joinTable' => 'desenvolvedores_sistemas',
                'foreignKey' => 'desenvolvedor_id',
                'associationForeignKey' => 'sistema_id',
            )
    );
}
