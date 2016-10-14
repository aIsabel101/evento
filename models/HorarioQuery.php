<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Horario]].
 *
 * @see Horario
 */
class HorarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Horario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Horario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
