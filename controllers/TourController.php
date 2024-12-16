<?php

namespace app\controllers;

use app\models\TourModel;
use yii\web\Controller;

class TourController extends Controller
{
    public function actionIndex()
    {
        $sort = \Yii::$app->request->get('sort');

        $items = $sort ? TourModel::getSortData('price', $sort) : TourModel::getAllData();
        return $this->render('index', [
           'items' => $items
        ]);
    }
    public function actionCreate()
    {
        $model = new TourModel();
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->addData($model)) {
                return $this->redirect('index');
            }
        }
        return $this->render('create',[
            'model' => $model
        ]);
    }
    public function actionUpdate($id)
    {
        $modelData = TourModel::getDataById($id);

        $model = new TourModel(current($modelData));

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
        TourModel::deleteById($id);
        return $this->redirect('index');
    }
    public function actionSearch()
    {
        $model = new TourModel();
        $search = $this->request->post('search');

        return $this->render('index', [
            'model' => $model,
            'items' => $model->searchData($search)
        ]);
    }
    public function actionView($id)
    {
        $data = TourModel::getDataViewById($id);
        return $this->render('view', [
            'data' => $data,
        ]);
    }
}