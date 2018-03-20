<?php
class DataManager
{
    function registerData($id)
    {
        $data = Data::model()->findByPk($id);
        if(!$data)
            return false;
        echo "Data registered. $data->title";
        return $data->delete();
    }
}
