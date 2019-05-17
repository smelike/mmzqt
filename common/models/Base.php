<?php

namespace common\models;

use yii;

class Base extends \yii\db\ActiveRecord
{

  /*
	 * Replace the url-path in rich-text content tag-img's attribute src. 
	 * Use the identifier {ES668_IMAGE_DOMAIN} instead of the url path.
	 * Define the constant in config/params.php
	 * @param $orientation 
	 * false means replace the url-path to identifier
	 * true means 
	*/
	protected function imageDomain($richText, $orientation = false)
	{
		//$pattern = "/src=\"(http|https):\/\/\w+.?\w+\.(com|cn|net):?[0-9]+/i";
		
		$identifier = "src=\"{ES668_IMAGE_DOMAIN}";
		
		if ($orientation) {
			$search = $identifier;
			$replacement = "src=\"" . Yii::$app->params['imageDomain'];
			$richText = str_replace($search, $replacement, $richText);
		} else {
			$pattern = "/src=\"(http|https):\/\/\w+.?\w+\.(com|cn|net)(:?[0-9]+)?/i";		
			$richText = preg_replace($pattern, $identifier, $richText);
		}
		
		return $richText;
	}
}