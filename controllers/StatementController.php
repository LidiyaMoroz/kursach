<?php

namespace app\controllers;

use app\models\GroupModel;
use app\models\HotelModel;
use app\models\StatementModel;
use yii\web\Controller;

class StatementController extends Controller
{
    public function actionIndex()
    {
        $sort = \Yii::$app->request->get('sort');

        $items = $sort ? StatementModel::getSortData('price', $sort) : StatementModel::getAllData();
        return $this->render('index',[
           'items' => $items
        ]);
    }
    public function actionCreate()
    {
        $model = new StatementModel();

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->addData($model)) {
                return $this->redirect('index');
            }
        }

        $groups = GroupModel::getAllData(['id', 'name']);
        $groupsDropDown = array_column($groups, 'name', 'id');

        $hotels = HotelModel::getAllData(['id', 'name']);
        $hotelsDropDown = array_column($hotels, 'name', 'id');

        return $this->render('create', [
            'groupsDropDown' => $groupsDropDown,
            'hotelsDropDown' => $hotelsDropDown,
            'model' => $model
        ]);
    }
    public function actionUpdate($id)
    {
        $modelData = StatementModel::getDataById($id);

        $model = new StatementModel(current($modelData));

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->updateData($model)) {
                return $this->redirect('index');
            }
        }

        $groups = GroupModel::getAllData(['id', 'name']);
        $groupsDropDown = array_column($groups, 'name', 'id');

        $hotels = HotelModel::getAllData(['id', 'name']);
        $hotelsDropDown = array_column($hotels, 'name', 'id');

        return $this->render('update', [
            'groupsDropDown' => $groupsDropDown,
            'hotelsDropDown' => $hotelsDropDown,
            'model' => $model
        ]);
    }
    public function actionDelete($id)
    {
        StatementModel::deleteById($id);
        return $this->redirect('index');
    }
}