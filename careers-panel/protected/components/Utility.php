<?php
/**
 *
 */
class Menus
{

  function __construct()
  {
     //->loc =
  }

  public static function county()
  {
    return Location::getLocation(Yii::app()->user->default);
  }

  public static function eventsDropDownList()
	{
    $loc = Menus::county();
		$query = Events::model()->findAll(array('select'=>'id, name, alias, image'));
		foreach ($query as $k)
		{
			$events[] = array('label'=>$k->name.' Venues', 'url'=>array('/venues/eventslocation', 'lid'=>$loc->location_id ,'evi'=>$k->id, 'alias'=>$k->alias.'-'.$loc->alias));
		}

		return $events;
	}

  public static function typesDropDownList()
  {
    $loc = Menus::county();
    $sql = VenueTypes::model()->findAll(array('order'=>'title ASC'));
    foreach ($sql as $k)
		{
			$types[] = array('label'=>$k->title.' Venues', 'url'=>array('/venues/typeslocation', 'lid'=>$loc->location_id ,'tyi'=>$k->id, 'alias'=>$k->alias.'-'.$loc->alias));
		}

		return $types;
  }

  public function locationDropDownList()
  {
      $sql = Location::getChildLocations(Yii::app()->user->default);
      foreach ($sql as $k)
      {
      	$locations[] = array('label'=>$k->title.' Venues', 'url'=>array('/venues/location', 'lid'=>$k->location_id , 'alias'=>'venues-in-'.$k->alias));
      }
      return $locations;
  }

}

 ?>
