<?php
/**
 *
 */
class SmsApi
{
  public function init()
	{

	}
  public function sendSMS($fone, $message)
	{
		$partnerID = Yii::app()->params["partnerId"];
		$apikey    = Yii::app()->params["apiKey"];
		$shortcode = Yii::app()->params["shortCode"];


		$finalURL = "https://isms.celcomafrica.com/api/services/sendsms/?apikey=" . urlencode($apikey) . "&partnerID=" . urlencode($partnerID) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$fone";
		//echo "<pre>"; print_r($finalURL); echo "</pre>"; exit;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $finalURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		//echo "Response: $response";
		 return $response;
	}
}

 ?>
