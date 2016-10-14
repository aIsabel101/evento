<?php

namespace app\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "ciudad".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $sigla
 * @property string $estado
 *
 * @property User[] $users
 */
class Permiso extends  Model
{
  const ROLE_AUXILIAR = 10;
  const ROLE_ADMIN = 30;
   const ROLE_EXPOSITOR = 30;
    const ROLE_COLABORADOR = 30;
        const ROLE_PARTICIPANTE = 30;

    
 public static function getAccess($rol,$controller,$action) {
        $variable=false;
$rights_none = array ( 'home' => array ( 'index', 'show' ) );

$colaborador = array_merge_recursive( $rights_none, array ( 
               
                'user' => array ( 
                                'index', 
                                'create',
                                'update', 
                                'delete', 
                                'view'
                    
                                 ),
                 'evento' => array ( 
                               'index', 
                               'create', 
                                'update', 
                                'delete', 
                                'view')
    ) );


$admin = array ( 
                'user' => array ( 
                                'index', 
                                'create',
                                'update', 
                                'delete', 
                                'view'
                    
                                 ),
		'evento' => array ( 'index', 
                                'create', 
                                'update', 
                                'delete', 
                                'view' ),
    'cronograma' => array ( 'index', 
                                'show'
                                 )
    
    
    
    );


$expositor = array ( 
                'user' => array ( 
                                'index', 
                                'create', 
                                //'update', 
                                'delete', 
                                'view'),
		'producto' => array ( 'index', 
                                'create', 
                                'update', 
                                'delete', 
                                'view' ));







$participante = array ( 
                'user' => array ( 
                               
                                'view'));
		

$permisos = array ( 
                'COLABORADOR' => $colaborador, 
                'EXPOSITOR'=>$expositor,
                'PARTICIPANTE'=>$participante,
                'ADMIN' => $admin,
                 );

                  foreach ($permisos[$rol] as $posicion=>$modulos)
                  {
                      
                       if($posicion==$controller)
                       {
                     foreach($modulos as $posicion=>$accion)
                        {
                         
                         if($action==$accion)
                         {
                             $variable=TRUE;
                     
                         }
                        }
                       }
                  }
                  return  $variable;
           

    }
  
}
