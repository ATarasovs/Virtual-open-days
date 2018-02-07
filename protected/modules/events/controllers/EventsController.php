<?php

class EventsController extends Controller
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
                'actions'=>array('view, edit, listAllEvents, listSubscribedEvents'),
                'users'=>array('*'),
            ),
        );
    }

    
    public function actionListAllEvents() {
        
        $id = Yii::app()->user->getId(); 
        
        $criteria = new CDbCriteria();
        
        try {
            $users = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $count=Event::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $events = Event::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $participants = Participant::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if($users->isAdmin == "true") {
            $this->layout = '//layouts/adminmenu';
        }
        else {
            $this->layout ='//layouts/usermenu';
        }

        $this->render('list', array(
            'events' => $events,
            'participants' => $participants,
            'pages' => $pages,
        ));
    }
    
    public function actionListSubscribedEvents() {
        $id = Yii::app()->user->getId();
        
        $eventsCriteria = new CDbCriteria();
        $participantsCriteria = new CDbCriteria();
        
        try {
            $users = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $participantsCriteria->addCondition("userId = '$id'");
            $participants = Participant::model()->findAll($participantsCriteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $subscribedEventIds = array();
        
        foreach ($participants as $participant) {
            array_push($subscribedEventIds, $participant->eventId);
        }
        
        try {
            $eventsCriteria -> addInCondition("eventId", $subscribedEventIds);
            $count=Event::model()->count($eventsCriteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($eventsCriteria);
            $events = Event::model()->findAll($eventsCriteria);
        } 
        catch (Exception $ex) {
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if($users->isAdmin == "true") {
            $this->layout = '//layouts/adminmenu';
        }
        else {
            $this->layout ='//layouts/usermenu';
        }
            
        $this->render('list',array(
            'events' => $events,
            'participants' => $participants,
            'pages' => $pages,
        ));
    }
    
        public function actionAdmin() {
        
        $id = Yii::app()->user->getId(); 
        
        $criteria = new CDbCriteria();
        
        try {
            $users = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $count=Event::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $events = Event::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if($users->isAdmin == "true") {
            $this->layout = '//layouts/adminmenu';
        }
        else {
            $this->layout ='//layouts/usermenu';
        }

        $this->render('admin', array(
            'events' => $events,
            'pages' => $pages,
        ));
    }
    
    public function actionView(){
		
        $eventId = Yii::app()->request->getParam('id');
        Yii::trace($eventId, "http");
        $userId = Yii::app()->user->getId(); 

        try {
            $users = User::model()->findByPk($userId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }

        if (!empty($eventId)) {
            try{
                $model = Event::model()->findByPk($eventId, array());
            }
            catch (Exception $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash('danger', $ex->getMessage());
            }

            if ($model->isStarted == "false") {
                Yii::app()->user->setFlash("notice", "Event haven't started yet");
    //            $this->redirect(Yii::app()->createUrl('events/events/view'));
            }
            if ($model->isFinished == "true") {
                Yii::app()->user->setFlash("notice", "Event is finished already");
                //redirect to the video location of the event
    //            $this->redirect(Yii::app()->createUrl('events/events/view'));
            }
        }
        else {
            Yii::app()->user->setFlash("danger", "Event is not selected");
        }
        
        $criteria = new CDbCriteria();
        $criteria->addCondition("eventId = '$eventId'");
        try {
            $messages = Message::model()->findAll($criteria);
        } 
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }

        if($users->isAdmin == "true") {
            $this->layout = '//layouts/adminmenu';
        }
        else {
            $this->layout ='//layouts/usermenu';
        }

        $this->render('view', array(
            'model' => $model,
            'messages' => $messages,
        ));
    }

    public function actionEdit(){
        $eventId = Yii::app()->request->getParam('id');
        $userId = Yii::app()->user->getId(); 
        
        try {
            $users = User::model()->findByPk($userId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if (!empty($eventId)) {
            try{
                $model = Event::model()->findByPk($eventId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        else {
            $model = new Event();
        }

        $this->performAjaxValidation($model);
        
        if(isset($_POST['Event'])){
            $model->attributes=$_POST['Event'];

            if ($model->save()) {
                Yii::trace("Event form sent", "http");
                $this->redirect(array('events/listAllEvents'));
            }
        }
        
        $locations = array();
        
        try {
            $locationsCollection = Location::model()->findAll();
            foreach($locationsCollection as $locationModel){
                $locations[$locationModel->locationId] = $locationModel->locationName;
            }
        }
        catch(EActiveResourceRequestException_ResponseFalse $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash("danger", $ex->getMessage());
        }
        
        if($users->isAdmin == "true") {
            $this->layout = '//layouts/adminmenu';
        }
        else {
            $this->layout ='//layouts/usermenu';
        }

        $this->render('edit', array(
            'model' => $model,
            'locations' => $locations,
        ));
    }   
    
    public function actionSubscribe() {
        $userId = Yii::app()->user->getId(); 
        $eventId = $_POST['eventId'];
        $status = $_POST['status'];
        
        if ($status == "true") {
            $model = new Participant();
            $model->userId = $userId;
            $model->eventId= $eventId;
            
            if ($model->save()) {
                Yii::trace("Participant form sent", "http");
            }
        }
        
        else if ($status == "false") {
            if (Participant::model()->deleteAll("eventId ='" . $eventId . "' AND userId = '" . $userId . "'")) {
                Yii::trace("Participant form sent", "http");
            }
        }
        
        Yii::trace($status, "http");
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
