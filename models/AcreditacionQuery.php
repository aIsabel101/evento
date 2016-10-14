<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Acreditacion]].
 *
 * @see Acreditacion
 */
class AcreditacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Acreditacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Acreditacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
