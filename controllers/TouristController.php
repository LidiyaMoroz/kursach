<?php

namespace app\controllers;

use app\models\TouristModel;
use yii\web\Controller;

class TouristController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = TouristModel::getIndexDataProvider();

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionCreate()
    {
        $model = new TouristModel();
        if ($this->request->isPost && $model->load($this->request->post())) {
            echo '<pre>';
            var_dump($model);die;
        }
        return $this->render('create',[
            'model' => $model
        ]);
    }
}