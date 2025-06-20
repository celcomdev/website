<?php
class Currency extends CFormatter
{
    private $currencies=array();
    private $_currency;
    private $code = '';

    public function __construct()
    {
        $query = Yii::app()->db->createCommand("SELECT * FROM currencies WHERE status=1")->queryAll();
        foreach($query as $result)
        {
            $this->currencies[$result['code']]=array(
            'currency_id'   => $result['currency_id'],
            'title'         => $result['title'],
            'code'   		    => $result['code'],
            'symbol_left'   => $result['symbol_left'],
            'symbol_right'  => $result['symbol_right'],
            'decimal_place' => $result['decimal_place'],
            'decimal_point' => $result['decimal_point'],
            'thousand_point'=> $result['thousand_point'],
            'value'  		    => $result['value'],
            'status'        => $result['status'],
            );
        }
        if (isset(Yii::app()->session['currency']) && array_key_exists(Yii::app()->session['currency'], $this->currencies))
        {
          $this->set(Yii::app()->session['currency']);
        } else {
          $this->set(Yii::app()->config->getData('CONFIG_WEBSITE_CURRENCY'));
        }
    }

    public function set($currency)
    {
      $this->code = $currency;
    }

    /**
     * Format only number part (digit based)
     *
     * @param float  $number
     * @param string $currency
     * @param string $crr_value
     *
     * @return string
     */
    public function format_number($number, $currency= '', $crr_value = '')
    {
        return $this->format($number, $currency, $crr_value, false);
    }

    /**
     * Format number part and/or currency symbol
     *
     * @param float  $number
     * @param string $currency
     * @param string $crr_value
     * @param bool   $format
     *
     * @return string|float
     */
    public function format($number, $currency= '', $value = '', $format = true)
    {
      if($currency && $this->has($currency))
      {
        $symbol_left   = $this->currencies[$currency]['symbol_left'];
        $symbol_right  = $this->currencies[$currency]['symbol_right'];
        $decimal_place = $this->currencies[$currency]['decimal_place'];
      }
      else
      {
    		$symbol_left   = $this->currencies[$this->code]['symbol_left'];
    		$symbol_right  = $this->currencies[$this->code]['symbol_right'];
    		$decimal_place = $this->currencies[$this->code]['decimal_place'];

    		$currency = $this->code;
      }

    //  $value=$value!=""?(float)$number *$value:(float)$number *$this->currencies[$currency]['value'];;
      if (empty($value))
      {
        $value = $this->currencies[$currency]['value'];
      }

      if ($value) {
          $value = $number * $value;
      } else {
          $value = $number;
      }

      $string = '';

      if (($symbol_left) && ($format))
      {
  			$string .= $symbol_left;
  		}

      if ($format) {
  			$decimal_point = $this->currencies[$currency]['decimal_point'];
  		} else {
  			$decimal_point = '.';
  		}

      $thousand_point =',';

      $string .= number_format(round($value, (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);

      if (($symbol_right) && ($format)) {
  			$string .= $symbol_right;
  		}

  		return $string;
    }

    /*public function convert($sum, $id=null)
  	{
  		if($id !== null && isset($this->_currencies[$id]))
  			$currency = $this->_currencies[$id];
  		else
  			$currency = $this->_active;

  		return $currency->rate * $sum;
  	}
    */
    /**
	 * Convert cum from main currency to selected currency
	 * @param mixed $sum
	 * @param mixed $id StoreCurrency. If not set, sum will be converted to active currency
	 * @return float converted sum
	 */
    public function convert($value, $from, $to)
    {
      if(isset($this->currencies[$from]))
      {
          $from = $this->currencies[$from]['value'];
      } else{
        $from = 1;
      }

      if(isset($this->currencies[$to]))
      {
          $to = $this->currencies[$to]['value'];
      } else{
        $to = 1;
      }
      return $value * ($to / $from);
    }

    public function has($currency)
    {
  		return $this->currencies[$currency];
  	}

    public function getId($currency = '')
    {
    	if (!$currency)
      {
    		return $this->currencies[$this->code]['currency_id'];
    	} elseif ($currency && isset($this->currencies[$currency])) {
    		return $this->currencies[$currency]['currency_id'];
    	} else {
    		return 0;
    	}
    }

    public function getCode() {
  		return $this->code;
  	}

    public function getValue($currency = '')
    {
  		if (!$currency) {
  			return $this->currencies[$this->code]['value'];
  		} elseif ($currency && isset($this->currencies[$currency]))
      {
  			return $this->currencies[$currency]['value'];
  		} else {
  			return 0;
  		}
  	}

}
