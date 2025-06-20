<?php

class ConfigForm extends CActiveRecord //CFormModel
{
	private $_dynamicData=array();
  private $_dynamicFields = array();

  public function rules()
  {
      return array(
				//array(implode(",",array_keys($this->_dynamicFields)), 'required'),
				array(implode(",",array_keys($this->_dynamicFields)), 'safe'),
      );
  }

	  public function tableName()
		{
			return 'configuration';
		}

		public function attributeNames()
		{
			return array_merge(
				parent::attributeNames(),
				array_keys($this->_dynamicFields)
			);
		}

		public function attributeLabels()
		{

			return array(
				'CONFIG_SITE_NAME' 			=> 'Website Name',
				'CONFIG_SITE_URL'				=> 'Website URL',
				'CONFIG_SITE_LOGO'			=> 'Website Logo',
				'CONFIG_SITE_EMAIL'			=> 'Website Email',
				'CONFIG_SITE_PHONE'			=> 'Website Telephone',
				'CONFIG_SITE_ADDRESS'		=> 'Website Address',
				'CONFIG_SITE_MAP_MARKER'=> 'Location Map',
				'CONFIG_SITE_FACEBOOK'	=> 'Facebook Link',
				'CONFIG_SITE_TWITTER'		=> 'Twitter Link',
				'CONFIG_SITE_LINKEDIN'	=> 'LinkedIn',
				'CONFIG_SITE_GOOGLE'		=> 'Google Plus',
				'CONFIG_SITE_CONTACT_PAGE_INTRO' => 'Contact Page Intro Text',
				'CONFIG_STATS_ACRES'		=> 'Acres Stats Value',
				'CONFIG_STATS_FARMER_SPONSOR'	=> 'Farmer Sponsor Stats',
				'CONFIG_STATS_REGISTERED_FARMERS' => 'Registered Farmers Stats',
				'CONFIG_STATS_FARM_FOLLOWERS'	  => 'Farm Followers',
				'CONFIG_STATS_CHICKEN_REARED'	  => 'Chicken Reared',
				'CONFIG_WEBSITE_COPYRIGHTS'		  => 'Website Copyrights',
				'CONFIG_WEBSITE_FOOTER_TEXT'	  => 'Footer About Text',

			);

		}

    public function __get($name)
    {
			if (!empty($this->_dynamicFields[$name]))
			{
				return $this->_dynamicData[$name];
			} else {
				return parent::__get($name);
			}
    }

		public function __set($name, $val)
		{
			if (!empty($this->_dynamicFields[$name])) {
				$this->_dynamicData[$name] = $val;
			} else {
				parent::__set($name, $value);
			}
		}

		public function ConfigForm()
		{
			$configFields=array();
			foreach(Configuration::model()->getConfigurations() as $config):
				$this->_dynamicFields[$config['key']]=1;
				$this->_dynamicData[$config['key']]=$config['value'];
			endforeach;

		}
}
