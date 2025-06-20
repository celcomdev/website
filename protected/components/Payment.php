<?php
/**
 *
 */
class Payment
{
  public function init()
  {
  }

  public function getMethods()
  {
    $rows = Yii::app()->db->createCommand("SELECT * FROM configuration_group where `type` = 'PAYMENT'")->queryAll();
    $data = array();
    foreach ($rows as $row)
    {
      $methods = Yii::app()->db->createCommand("SELECT * FROM configuration WHERE `code` = '". $row['code'] ."'")->queryAll();
      foreach ($methods as $method)
      {
        $data[$method['code']][$method['key']] = $method['value'];
      }
    }

    $gateway = array();
    foreach ($data as $k => $v)
    {
      if ($v[$k . '_STATUS'] == 1)
      {
        $model = $v[$k . '_FILE'] . '_Class';
        Yii::import('application.models.payment.' . $model);
        $obj = new $model;
        if ($obj->isAllowed())
        {
          $gateway['code'][$k] = array('code' => $k, 'title' => $v[ $k . '_TITLE'], 'key' => $v[$k . '_FILE'], 'logo'=>$v[$k.'_LOGO']);
          $gateway['sort_order'][] = $v[$k . '_SORT_ORDER'];
        }
      }
    }

    array_multisort($gateway['sort_order'], SORT_ASC, $gateway['code']);

    return $gateway['code'];
  }

	public function getMethod($payment)
	{
		$row = Yii::app()->db->createCommand("SELECT * FROM configuration WHERE code = '".$payment."' and `key` like '".$payment."_TITLE'")->queryRow();
		/*echo '<pre>';print_r(array('id'=>$payment,
					'module'=>$row->value,
					));exit;*/
		return array('id'=>$payment, 'module'=>$row['value']);
	}

 	public function getAdditionalParams()
	{
		$return=array();
		$row = Yii::app()->db->createCommand("select * from configuration where code = '".$_SESSION['payment_method']['id']."' and `key` like '".$_SESSION['payment_method']['id']."_FILE'")->queryRow();

		$model = $row['value'] . '_Class';
		Yii::import('application.models.payment.' . $model);
		$obj = new $model;
		if($obj->isAllowed())
		{
			$return['inputFields']=$obj->setInputFields();
			$return['hiddenData']=$obj->setHiddenData();
			$return['action']=$obj->form_action_url!=""?$obj->form_action_url:Yii::app()->createAbsoluteUrl('checkout/checkoutprocess');

		}else
		{
			$return['inputFields']=false;
			$return['hiddenData']=false;
		}
		return $return;
	}

	public function beforeOrderProcess()
	{
		$row = Yii::app()->db->createCommand("select * from configuration where code = '".$_SESSION['payment_method']['id']."' and `key` like '".$_SESSION['payment_method']['id']."_FILE'")->queryRow();

		$model = $row['value'] . '_Class';
		Yii::import('application.models.payment.' . $model);
		$obj = new $model;
		$obj->beforeOrderProcess();
	}

	public function afterOrderProcess()
	{
		$row = Yii::app()->db->createCommand("select * from configuration where code = '".$_SESSION['payment_method']['id']."' and `key` like '".$_SESSION['payment_method']['id']."_FILE'")->queryRow();
		$model = $row['value'] . '_Class';
		Yii::import('application.models.payment.' . $model);
		$obj = new $model;
		$obj->afterOrderProcess();
	}
}
