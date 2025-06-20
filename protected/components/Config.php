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

        $currencies = Yii::app()->db->createCommand("SELECT * FROM currencies WHERE status=1")->queryAll();
        foreach ($currencies as $currency)
        {
          $this->data['currencies'][$currency['code']] = $currency;
        }
    }

}
