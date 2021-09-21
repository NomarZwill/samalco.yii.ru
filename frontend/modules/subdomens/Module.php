<?php

namespace app\modules\subdomens;


use Yii;
use common\models\Subdomen;
use common\models\Branch;
/**
 * svadbanaprirode module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $subdomen = explode('.', $_SERVER['HTTP_HOST'])[1]; // для dev - 1, для prod - 0
        if ($subdomen != 'samalco'){
            Yii::$app->params['subdomen'] = $subdomen;

            $subdomenModel = Subdomen::find()
                ->where(['alias' => $subdomen])
                ->one();

            if (!$subdomenModel){
                throw new \yii\web\NotFoundHttpException();         
            }

            $branchModel = Branch::find()
                ->where(['alias' => $subdomen])
                ->one();

        } else {
            Yii::$app->params['subdomen'] = '';

            $subdomenModel = Subdomen::find()
                ->where(['alias' => ''])
                ->one();

            $branchModel = Branch::find()
                ->where(['alias' => ''])
                ->one();
        }

        if ($subdomenModel && $branchModel){
            Yii::$app->params['subdomen_alias'] = $subdomenModel->alias;
            Yii::$app->params['subdomen_baseid'] = $subdomenModel->id;
            Yii::$app->params['subdomen_name'] = $subdomenModel->name;
            Yii::$app->params['subdomen_dec'] = $subdomenModel->name_dec;
            Yii::$app->params['subdomen_rod'] = $subdomenModel->name_rod;
            Yii::$app->params['branch_full_name'] = $branchModel->name;
            Yii::$app->params['branch_phone'] = $branchModel->phone;
            Yii::$app->params['branch_email'] = $branchModel->email;
        }
            
        parent::init();
    }
}
