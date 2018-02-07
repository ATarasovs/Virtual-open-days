<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'locations':
 * @property integer $eventId
 * @property string $eventName
 * @property string $eventDescription
 * @property string $locationId
 * @property string $eventStartTime
 * @property string $isStarted
 * @property string $isFinished
 */
class Event extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eventName, eventDescription, eventStartTime', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                        array('eventId, eventName, eventDescription, locationId, eventStartTime, isStarted, isFinished', 'safe'),
//			array('eventId, eventName, eventDescription, locationId, eventStartTime, isStarted, isFinished', 'safe', 'on'=>'search'),
                    
//                        array('eventName', 'unique'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eventId' => 'Event ID',
			'eventName' => 'Event Name',
			'eventDescription' => 'Event Description',
                        'eventStartTime' => 'Event Time',
                        'isStarted' => 'Is Started',
                        'isFinished' => 'Is Finished',
			'locationId' => 'Location ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

                $criteria->compare('eventId',$this->eventId);
		$criteria->compare('eventName',$this->eventName, true);
		$criteria->compare('eventDescription',$this->eventDescription, true);
                $criteria->compare('eventStartTime',$this->eventStartTime, true);
                $criteria->compare('isStarted',$this->isStarted, true);
                $criteria->compare('isFinished',$this->isFinished, true);
                $criteria->compare('locationId',$this->locationId, true);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function beforeSave()
        {
            return parent::beforeSave();
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
