<?php

namespace app\controllers;

use app\models\HotelModel;
use yii\web\Controller;

class HotelController extends Controller
{
    public function actionIndex()
    {
        $items = HotelModel::getAllData();
        return $this->render('index',[
            'items' => $items
        ]);
    }
    public function actionCreate()
    {
        $model = new HotelModel();
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
        $modelData = HotelModel::getDataById($id);

        $model = new HotelModel(current($modelData));

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
        HotelModel::deleteById($id);
        return $this->redirect('index');
    }
    public function actionSearch()
    {
        $model = new HotelModel();
        $search = $this->request->post('search');

        return $this->render('index', [
            'model' => $model,
            'items' => $model->searchData($search)
        ]);
    }
}