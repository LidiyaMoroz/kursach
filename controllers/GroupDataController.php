<?php

namespace app\controllers;

use app\models\GroupDataModel;
use app\models\GroupModel;
use app\models\TouristModel;
use yii\web\Controller;

class GroupDataController extends Controller
{
    public function actionIndex()
    {
        $sort = \Yii::$app->request->get('sort');

        $items = $sort ? GroupDataModel::getSortData('price', $sort) : GroupDataModel::getAllData();
        return $this->render('index', [
            'items' => $items,
        ]);
    }
    public function actionCreate()
    {
        $model = new GroupDataModel();
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->addData($model)) {
                return $this->redirect('index');
            }
        }

        $tourists = TouristModel::getAllData(['id', 'name']);
        $touristsDropDown = array_column($tourists, 'name', 'id');

        $groups = GroupModel::getAllData(['id', 'name']);
        $groupsDropDown = array_column($groups, 'name', 'id');

        return $this->render('create',[
            'model' => $model,
            'touristsDropDown' => $touristsDropDown,
            'groupsDropDown' => $groupsDropDown
        ]);
    }
    public function actionUpdate($id)
    {
        $modelData = GroupDataModel::getDataById($id);
        $model = new GroupDataModel(current($modelData));

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->updateData($model)) {
                return $this->redirect('index');
            }
        }

        $tourists = TouristModel::getAllData(['id', 'name']);
        $touristsDropDown = array_column($tourists, 'name', 'id');

        $groups = GroupModel::getAllData(['id', 'name']);
        $groupsDropDown = array_column($groups, 'name', 'id');

        return $this->render('update',[
            'model' => $model,
            'touristsDropDown' => $touristsDropDown,
            'groupsDropDown' => $groupsDropDown
        ]);
    }
    public function actionDelete($id)
    {
        GroupDataModel::deleteById($id);
        return $this->redirect('index');
    }
}