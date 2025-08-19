<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Topic;
use app\models\Undertopic;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $topics = Topic::find()->all();
        return $this->render('index', [
            'topics' => $topics,
        ]);
    }

    /**
     * Returns undertopics list for a given topic (AJAX fragment).
     * @param int $topic_id
     * @return string
     */
    public function actionUndertopics($topic_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Undertopic::find()->where(['topic_id' => $topic_id])->with('topic'),
        ]);

        \Yii::$app->response->format = Response::FORMAT_HTML;
        $this->layout = false;

        return $this->renderPartial('@app/views/undertopic/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

        /**
     * Displays homepage.
     * @param int $undertopic_id
     * @return string
     */
    public function actionContent($undertopic_id)
    {
        $undertopic = Undertopic::findOne($undertopic_id);
        \Yii::$app->response->format = Response::FORMAT_HTML;
        $this->layout = false;
        if (!$undertopic) {
            return 'Пусто';
        }
        return $this->renderPartial('@app/views/undertopic/view', [
            'model' => $undertopic,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
