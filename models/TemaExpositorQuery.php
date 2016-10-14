<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TemaExpositor]].
 *
 * @see TemaExpositor
 */
class TemaExpositorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TemaExpositor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TemaExpositor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
