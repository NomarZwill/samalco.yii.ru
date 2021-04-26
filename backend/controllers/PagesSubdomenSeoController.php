<?php

namespace backend\controllers;

use Yii;
use common\models\PagesSubdomenSeo;
use common\models\Subdomen;
use backend\models\PagesSubdomenSeoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagesSubdomenSeoController implements the CRUD actions for PagesSubdomenSeo model.
 */
class PagesSubdomenSeoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PagesSubdomenSeo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagesSubdomenSeoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PagesSubdomenSeo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PagesSubdomenSeo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($page_id, $subdomen_id, $page_type, $is_slice)
    {
        $model = new PagesSubdomenSeo();
        $model->page_id = $page_id;
        $model->subdomen_alias = Subdomen::find()->where(['id' => $subdomen_id])->one()->alias;
        $model->page_type = $page_type;
        $model->is_slice = $is_slice;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($is_slice){
                return $this->redirect("/slices/update/?id=" . $page_id);
            } else {
                return $this->redirect("/pages/update/?id=" . $page_id);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PagesSubdomenSeo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $page_id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->is_slice){
                return $this->redirect("/slices/update/?id=" . $page_id);
            } else {
                return $this->redirect("/pages/update/?id=" . $page_id);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PagesSubdomenSeo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PagesSubdomenSeo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PagesSubdomenSeo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PagesSubdomenSeo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
