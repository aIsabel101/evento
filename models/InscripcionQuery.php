<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Inscripcion]].
 *
 * @see Inscripcion
 */
class InscripcionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Inscripcion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Inscripcion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
