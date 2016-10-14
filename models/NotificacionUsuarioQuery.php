<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NotificacionUsuario]].
 *
 * @see NotificacionUsuario
 */
class NotificacionUsuarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return NotificacionUsuario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NotificacionUsuario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
