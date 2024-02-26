<?php
namespace app\rbac;

use yii\rbac\Rule;
/**
* Comprueba si authorID coincide con el usuario pasado como par´ametro
*/
class AuthorRule extends Rule
{
    public $name = 'isBasic';
    /**
    * @param string|int $user el ID de usuario.
    * @param Item $item el rol o permiso asociado a la regla
    * @param array $params par´ametros pasados a ManagerInterface::checkAccess().
    * @return bool un valor indicando si la regla permite al rol o permiso con el que est´a asociado.
    */
    public function execute($user, $item, $params){
        return isset($params['users']) ? $params['users']->id == $user: false;
    }
}