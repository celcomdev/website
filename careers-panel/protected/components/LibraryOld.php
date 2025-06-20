<?php

class Library
{
	public static function stringURLSafe($string)
	{
		// Remove any '-' from the string since they will be used as concatenaters
		$str = str_replace('-', ' ', $string);

		// Trim white spaces at beginning and end of alias and make lowercase
		$str = trim(strtolower($str));

		// Remove any duplicate whitespace, and ensure all characters are alphanumeric
		$str = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $str);

		// Trim dashes at beginning and end of alias
		$str = trim($str, '-');

		return $str;
	}

	public static function thumb($data)
	{
		$file = $data['img'];
		$dir  = $data['dir'];

		if(!empty($file) && is_object($file))
		{
		  if (!is_dir($dir))
		  {
			@mkdir($dir, 0777, true);
			@chmod($dir, 0777);
			touch($dir.DIRECTORY_SEPARATOR.'index.htm');
		  }

				if(!empty($data['old']))
				{
					if(file_exists($dir.$data['old']))
					{
						 chmod($dir.$data['old'], 0777);
						 unlink($dir.$data['old']);
					}
				}// delete old logo
				
				
			$filename = $file->getName();
			$seoname = Library::stringURLSafe($filename);
			
			$parts = explode('.', $filename);	
			$ext   = strtolower(end($parts));
								
			$new_name = $seoname . '.' . (end($ext));		

			$file->saveAs($dir.'/'.$new_name);
				$src  = $dir.'/'.$new_name;
			// thumbs
			$thumb =Yii::app()->thumbs->create($src);
				$thumb->adaptiveResize($data['w'], $data['h']);
				$thumb->save($src);

				return array('image'=>$new_name);
		} else {
		  throw new ExceptionClass('Image not found');
		}
	}

	public static function upload($data)
	{
		if (!isset($data))
			return;

		$dir = $data['path'];
		if (!is_dir($dir))
		{
			@mkdir($dir, 0777, true);
			@chmod($dir, 0777);
			touch($dir.DIRECTORY_SEPARATOR.'index.htm');
		}
		$file = $data['doc'];

		if(!empty($file) && is_object($file))
		{
			if(!empty($data['prev']))
			{
				if(file_exists($dir.$data['prev']))
				{
					 chmod($dir.$data['prev'], 0777);
					 unlink($dir.$data['prev']);
				}
			}// delete old logo

			$filename = $file->getName();
			$ext = explode('.', $filename);
			$rnd = rand(0,99);
			$new_name = (md5( $filename.time(). $rnd)) . '.' . (end($ext));

			$file->saveAs($dir.'/'.$new_name);
			return array('doc'=>$new_name);
		}
	}

	public static function uploadImages($data)
	{
		if (!isset($data))
      return;

		if(!empty($data['images']) && count($data['images']) > 0)
		{
			$dirb = $data['dir'];
			if (!is_dir($dirb))
			{
				@mkdir($dirb, 0777, true);
				@chmod($dirb, 0777);
			}

			$pichas = new UpdatesGallery;
			$pichaArray = $pichas->findAll('update_id =:uid AND property_id =:pid', array(':uid'=>$data['uid'], ':pid' => $data['pid']));

			if(!empty($pichaArray))
			{
				//delete all pics for this vehicle
				foreach($pichaArray as $k => $v)
				{
					@unlink($dirb. $v['image']);
				}
				$pichas->deleteAll('update_id =:uid AND property_id =:pid', array(':uid'=>$data['uid'], ':pid' => $data['pid']));
			}

			foreach($data['images'] as $k => $v)
			{
				$majina = $v->getName();
				$tmp = explode('.', $majina);
		    $file_extension = strtolower(end($tmp));
				$filename = (md5( $majina . time() . rand(0,99))) . '.' . ($file_extension);

				if( $v->saveAs($dirb . $filename))
				{
					$pics = new UpdatesGallery;
					// save image in files table
					$pics->id = null;
					$pics->property_id = $data['pid'];
					$pics->update_id   = $data['uid'];
					$pics->image       = $filename;

					if ($pics->save(false))
					{
						$src  = $dirb.'/'.$filename;
			      // thumbs
			      $thumb =Yii::app()->thumbs->create($src);
						$thumb->adaptiveResize($data['w'], $data['h']);
						$thumb->save($src);

					}
				}
			}

			//return true;
		} //// loops gala img

	}
	public function getImageRepo()
	{
		return Yii::app()->config->getData('CONFIG_SITE_URL').'/images/';
	}

	public static function getSiteBasePath()
	{
	  return Yii::app()->params['config']['site_url'];
	}

	public static function randString($length = 6, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
	{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count - 1)];
    }
    return $str;
  }
}
