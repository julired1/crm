<?php

namespace app\controllers;

use app\models\Employees;
use app\models\Region;
use app\models\EmployeesSearch;
use app\models\EmployeesRight;
use app\models\EmployeesRightSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;

/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
{
     private function getEmployees() :?Employees {
        return Yii::$app->user->isGuest ? null : Yii::$app->user->identity->employees;
    }
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        $employees = $this->getEmployees();
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                     'rules' => [
                        [
                            //'actions' => ['index'],
                            'allow' => true,
                            'matchCallback' => function() use($employees) {
                                return $employees->is_admin;                                
                            },
                            'roles' => ['@'],
                        ],
                    ],
                ],
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
     * Lists all Employees models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'regions' => Region::getList(),
        ]);
    }

    /**
     * Displays a single Employees model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
            'rightIndex' => $this->renderRightIndex($model),
        ]);
        
        return $this->render('view', [
            'model' => $model,
            'rightIndex' => $this->renderRightIndex($model),
        ]);
    }
        private function renderRightIndex(Employees $model) {
        $searchModel = new EmployeesRightSearch();
        $searchModel->employees_id = $model->id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->renderPartial('/employees-right/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'types' => EmployeesRight::getTypeList(),
          
        ]);
    }

    /**
     * Creates a new Employees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Employees();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('form', [
            'model' => $model,
            'regions' => Region::getList(),
        ]);
    }

    /**
     * Updates an existing Employees model.
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
            'regions' => Region::getList(),
        ]);
    }

    /**
     * Deletes an existing Employees model.
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
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
