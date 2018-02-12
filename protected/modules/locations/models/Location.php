<?php

/**
 * This is the model class for table "locations".
 *
 * The followings are the available columns in table 'locations':
 * @property integer $locationId
 * @property string $locationName
 * @property string $locationDescription
 * @property string $locationShortDescription
 * @property string $locationDepartment
 * @property string $locationLatitude
 * @property string $locationLongitude
 * @property string $locaitonImage
 */
class Location extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'locations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('locationId, locationName, locationDescription, locationShortDescription, locationDepartment locationLatitude, locationLongitude, locaitonImage', 'safe', 'on'=>'search'),
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
			'locationId' => 'Location ID',
			'locationName' => 'Location Name',
			'locationDescription' => 'Location Description',
                        'locationShortDescription' => 'Location Short Description',
                        'locaitonDepartment' => 'Location Department',
			'locaitonLatitude' => 'Location Latitude',
                        'locaitonLongitude' => 'Location Longitude',
                        'locationImage' => 'Location Image',
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

                $criteria->compare('locationId',$this->locationId);
		$criteria->compare('locationName',$this->locationName, true);
		$criteria->compare('locationDescription',$this->locationDescription, true);
                $criteria->compare('locationShortDescription',$this->locationShortDescription, true);
                $criteria->compare('locationDepartment',$this->locationDepartment, true);
                $criteria->compare('locationLatitude',$this->locaionLatitude, true);
                $criteria->compare('locationLongitude',$this->locationLongitude, true);
                $criteria->compare('locaitonImage',$this->locaitonImage, true);
                
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
