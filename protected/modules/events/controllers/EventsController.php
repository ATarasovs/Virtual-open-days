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
        
        $criteria = new CDbCriteria();
        
        try {
            $locations = Location::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $criteria->order = "eventStartTime ASC";
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
        
        $this->layout = '//layouts/menu';

        $this->render('list', array(
            'events' => $events,
            'participants' => $participants,
            'locations' => $locations,
            'pages' => $pages,
        ));
    }
    
    public function actionListSubscribedEvents() {
        
        $id = Yii::app()->user->getId();
        
        $eventsCriteria = new CDbCriteria();
        $participantsCriteria = new CDbCriteria();
        
        try {
            $locations = Location::model()->findAll();
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
            $eventsCriteria->order = "eventStartTime ASC";
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
        
        $this->layout = '//layouts/menu';
            
        $this->render('list',array(
            'events' => $events,
            'participants' => $participants,
            'pages' => $pages,
            'locations' => $locations,
        ));
    }
    
    public function actionAdmin() { 
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true" || $user->isConfirmed != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $criteria = new CDbCriteria();
        
        try { 
            $criteria->order = "eventStartTime ASC";
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
            $locations = Location::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('admin', array(
            'events' => $events,
            'pages' => $pages,
            'locations' => $locations,
        ));
    }
    
    public function actionView(){
		
        $eventId = Yii::app()->request->getParam('id');
        $userId = Yii::app()->user->getId(); 
        
        $messageCriteria = new CDbCriteria();
        $participantCriteria = new CDbCriteria();

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

            if ($users->isAdmin == "false") {
                if ($model->isStarted == "false") {
                    Yii::app()->user->setFlash("notice", "Event haven't started yet");
                }
                if ($model->isFinished == "true") {
                    Yii::app()->user->setFlash("notice", "Event is finished already");
                }
            }
        }
        else {
            Yii::app()->user->setFlash("danger", "Event is not selected");
        }
        
        $messageCriteria->addCondition("eventId = '$eventId'");
        try {
            $messages = Message::model()->findAll($messageCriteria);
        } 
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $allUsers = User::model()->findAll();
        } 
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $participantCriteria->addCondition("eventId = '$eventId'");
        try {
            $participants = Participant::model()->findAll($participantCriteria);
        } 
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }

        $this->layout = '//layouts/menu';

        $this->render('view', array(
            'model' => $model,
            'messages' => $messages,
            'users' => $users,
            'participants' => $participants,
            'allUsers' => $allUsers,
        ));
    }

    public function actionEdit(){
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true" || $user->isConfirmed != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $eventId = Yii::app()->request->getParam('id');
        
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
            
            if (empty($eventId)) {
                $model->isStarted = "false";
                $model->isFalse = "false";
            }
            
            $model->image = CUploadedFile::getInstance($model,'image');
            $file = CUploadedFile::getInstance($model,'image');
            $eventName = preg_replace("/[^a-zA-Z0-9]+/", "", $model->eventName);
            if ($file != null) {
                $extension = $model->image->getExtensionName();
                
                if (!file_exists(Yii::app()->basePath . '/../images/events')) {
                    mkdir(Yii::app()->basePath . '/../images/events', 0777, true);
                }
                    
                @unlink(Yii::app()->basePath . '/../images/events/' . $eventName . '.png');
                @unlink(Yii::app()->basePath . '/../images/events/' . $eventName . '.jpg');
                @unlink(Yii::app()->basePath . '/../images/events/' . $eventName . '.jpeg');
                @unlink(Yii::app()->basePath . '/../images/events/' . $eventName . '.bmp');
                @unlink(Yii::app()->basePath . '/../images/events/' . $eventName . '.tiff');
                @unlink(Yii::app()->basePath . '/../images/events/' . $eventName . '.gif');

                $model->image->saveAs(Yii::app()->basePath . '/../images/events/' . $eventName . '.' . $extension);
                $model->eventImage = $eventName . '.' . $extension;
            }

            if ($model->save()) {
                Yii::trace("Event form sent", "http");
                Yii::app()->user->setFlash("success", "The changes were confirmed");
                $this->redirect(array('events/admin'));
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
        
        $this->layout = '//layouts/menu';

        $this->render('edit', array(
            'model' => $model,
            'locations' => $locations,
        ));
    }   
    
    public function actionDeleteRecord() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true" || $user->isConfirmed != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $eventId = Yii::app()->request->getParam('id');
        
        if (Participant::model()->deleteAll("eventId ='" . $eventId . "'")) {
            Yii::trace("Participant form sent", "http");
        }
        
        if (Event::model()->deleteAll("eventId ='" . $eventId . "'")) {
            Yii::trace("Event form sent", "http");
            Yii::app()->user->setFlash("success", "The changes were confirmed");
            $this->redirect(array('events/admin'));
        }
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
    
    public function actionChangeStatusEvent() {
        
        $eventId = $_POST['eventId'];
        
        try{
            $model = Event::model()->findByPk($eventId, array());
            
        }
        catch(EActiveResourceRequestException_ResponseFalse $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash("danger", $ex->getMessage());
        }
        
        
        if ($model->isStarted == "false") {
            $model->isStarted = "true";
        }
        
        else if ($model->isStarted == "true" && $model->isFinished == "false") {
            $model->isFinished = "true";
        }
        
        if ($model->save()) {
            Yii::trace("Event was started", "http");
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
