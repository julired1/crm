<?php

namespace app\controllers;

use app\models\Cost;
use app\models\CostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CostController implements the CRUD actions for Cost model.
 */
class CostController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cost models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cost model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    
    public function actionPublishedProcessesReport(): string {
        $searchModel = new CostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('published-processes', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'building' => $this->building->getList(),
        'employees' => $this->employees->getList(),
        'processes' => $this->product->getList(),
        'processes' => $this->price->getList(),
    ]);
    
    

    class PublishedProjectProcess extends Model {
    /**
    * @var string|null
    */
     public $cost_table;
    /**
    * @return array
    */
        public function attributeLabels() {
        return [
        'id' => 'Номер',
        'employees_name' => 'Сотрудник',
        'building_name' => 'Объект',
        'product' => 'Наименование',
        'price' => 'Стоимость',
        'comment' => 'Комментарий',
    ];
    }
    public function rules() {
       return [
        [['count_notices', 'count_read_notices', 'count_accesses', 'count_email_send'], 'integer'],
        [['project_part', 'searchAuthorName'], 'string'],
        [['isNoActiveUser'], 'boolean'],
        [['date_start'], 'date', 'format' => 'php:d.m.Y'],
        [['searchProject', 'searchExecutor'], 'string', 'min' => 1, 'max' => 30],
        ];
    }


    /**
     * Creates a new Cost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cost();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('form', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('form', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Cost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cost::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}