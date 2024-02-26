<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit(){
        $auth = Yii::$app->authManager;
        // agrega el permiso "allAccessProducts"
        $allAccessProducts = $auth->createPermission('allAccessProducts');
        $allAccessProducts->description = 'Acceso a todos los permisos del crud de productos';
        $auth->add($allAccessProducts);
        // agrega el permiso "allAccessCategories"
        $allAccessCategories = $auth->createPermission('allAccessCategories');
        $allAccessCategories->description = 'Acceso a todos los permisos del crud de categorias y sugcategorias';
        $auth->add($allAccessCategories);

        // agrega el rol "basic" y le asigna el permiso "createPost"
        $basic = $auth->createRole('basic');
        // agrega el rol "admin" y le asigna el permiso "updatePost"
        // m´as los permisos del rol "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $allAccessProducts);
        // asigna roles a usuarios. 1 y 2 son IDs devueltos por IdentityInterface::getId()
        // usualmente implementado en tu modelo User.
        $auth->assign($basic, 2);
        $auth->assign($admin, 1);
    }
}