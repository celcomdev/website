<?php
class Config
{
    private $data=array();

    public function getData($key)
    {
        return $this->data[$key];
    }

    public function init()
    {
      $sql="SELECT `key`,`value` FROM configuration";
      foreach (Yii::app()->db->createCommand($sql)->queryAll() as $config)
      {
        $this->data[$config['key']] = $config['value'];
      }
    }

}
