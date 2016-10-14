<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EventoExpositor]].
 *
 * @see EventoExpositor
 */
class EventoExpositorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EventoExpositor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EventoExpositor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
