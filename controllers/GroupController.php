<?php

namespace app\controllers;

use app\models\GroupModel;
use app\models\TourModel;
use yii\web\Controller;

class GroupController extends Controller
{
    public function actionIndex()
    {
        $items = GroupModel::getAllData();
        return $this->render('index', [
            'items' => $items
        ]);
    }
    public function actionCreate()
    {
        $tours = TourModel::getAllData();
    }
}