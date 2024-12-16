<?php

namespace app\controllers;

use app\models\GroupModel;
use app\models\TourModel;
use yii\web\Controller;

class GroupController extends Controller
{
    public function actionIndex()
    {
        $sort = \Yii::$app->request->get('sort');

        $items = $sort ? GroupModel::getSortData('quantity', $sort) : GroupModel::getAllData();
        return $this->render('index', [
            'items' => $items
        ]);
    }
    public function actionCreate()
    {
        $model = new GroupModel();

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->addData($model)) {
                return $this->redirect('index');
            }
        }

        $tours = TourModel::getAllData(['id', 'name']);

        $toursDropDown = array_column($tours, 'name', 'id');

        return $this->render('create', [
            'toursDropDown' => $toursDropDown,
            'model' => $model
        ]);
    }
    public function actionUpdate($id)
    {
        $modelData = GroupModel::getDataById($id);

        $model = new GroupModel(current($modelData));

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->updateData($model)) {
                return $this->redirect('index');
            }
        }

        $tours = TourModel::getAllData(['id', 'name']);

        $toursDropDown = array_column($tours, 'name', 'id');

        return $this->render('update',[
            'model' => $model,
            'toursDropDown' => $toursDropDown
        ]);
    }
    public function actionDelete($id)
    {
        GroupModel::deleteById($id);
        return $this->redirect('index');
    }
    public function actionSearch()
    {
        $model = new GroupModel();
        $search = $this->request->post('search');

        return $this->render('index', [
            'model' => $model,
            'items' => $model->searchData($search)
        ]);
    }
}