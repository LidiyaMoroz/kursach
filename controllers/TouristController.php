<?php

namespace app\controllers;

use app\models\TouristModel;
use yii\web\Controller;

class TouristController extends Controller
{
    public function actionIndex()
    {
        $model = new TouristModel();

        $items = $model->getData();
        return $this->render('index', [
            'items' => $items,
            'model' => $model
        ]);
    }
    public function actionCreate()
    {
        $model = new TouristModel();
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->addData($model)) {
                return $this->redirect('index');
            }
        }
        return $this->render('create',[
            'model' => $model
        ]);
    }
    public function actionSearch()
    {
        $model = new TouristModel();
        $search = $this->request->post('search');

        return $this->render('index', [
            'model' => $model,
            'items' => $model->searchData($search)
        ]);
    }
    public function actionUpdate($id)
    {
        $modelData = TouristModel::getDataById($id);

        $model = new TouristModel(current($modelData));

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->updateData($model)) {
                return $this->redirect('index');
            }
        }

        return $this->render('update',[
            'model' => $model,

        ]);
    }
    public function actionDelete($id)
    {
        TouristModel::deleteById($id);
        return $this->redirect('index');
    }
}