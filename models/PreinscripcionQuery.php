<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Preinscripcion]].
 *
 * @see Preinscripcion
 */
class PreinscripcionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Preinscripcion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Preinscripcion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
