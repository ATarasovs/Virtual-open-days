<?php

class MessagesController extends Controller
{
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }
    
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('loadMessages'),
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionLoadMessages() {
        
        $eventId = Yii::app()->request->getParam('id');
        
        $criteria = new CDbCriteria();
        $criteria->addCondition("eventId = '$eventId'");
        try {
            $messages = Message::model()->findAll($criteria);
        } 
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
         $this->renderPartial('application.modules.events.views.events._messages', array(
            'messages' => $messages,
        ));
    }
    
    public function actionSendMessage() {
        
        $message = $_POST['message'];
        $eventId = $_POST['eventId'];
        
        $username = Yii::app()->user->getName();
        $userId = Yii::app()->user->getId();
        
        try {
            $users = User::model()->findByPk($userId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $author = $users->firstName . " " . $users->lastName;
        
        $model = new Message();
//        $this->performAjaxValidation($model);
        
        $model->login = $username;
        $model->author = $author;
        $model->message = $message;
        $model->eventId = $eventId;

        if ($model->save()) {
            Yii::trace("Event form sent", "http");
        }
        else {
            Yii::trace("Something went wrong", "http");
        }
        
    }

   
    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='edit-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
