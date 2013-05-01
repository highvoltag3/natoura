<?php 
//file to give format to the weather and translate it into the correct lang..
//Copyrights Dario Novoa V.
//darionovoa@ideartte.com

						$weatherinformation = __('Weather Information','NatouraV3');
	            		$rain 				= __('Rain','NatouraV3');
	            		$snow 				= __('Snow','NatouraV3');
	            		$clear 				= __('Clear','NatouraV3');
						$cloudy 			= __('Cloudy','NatouraV3');
						$flurries 			= __('Flurries','NatouraV3');
						$fog 				= __('Foggy','NatouraV3');
						$hazy 				= __('Hazy','NatouraV3');
						$mostlycloudy 		= __('Mostly Cloudy','NatouraV3');
						$mostlysunny		= __('Mostly Sunny','NatouraV3'); 
						$partlycloudy		= __('Partly Cloudy','NatouraV3'); 
						$partlysunny 		= __('Partly Sunny','NatouraV3'); 
						$sleet 				= __('Sleet','NatouraV3'); 
						$sunny 				= __('Sunny','NatouraV3'); 
						$tstorms 			= __('Thunderstorm','NatouraV3'); 
						$unknown 			= __('Unknown','NatouraV3');
						$today 				= __('Today','NatouraV3');
						 
	            		function replace_weather($contentW) 
	            		{
						    $contentW = str_replace('Weather information', $weatherinformation, $contentW);
						    $contentW = str_replace('Rain', $rain, $contentW);
						    $contentW = str_replace('Clear', $clear, $contentW);
						    $contentW = str_replace('Cloudy', $cloudy, $contentW);
						    $contentW = str_replace('Flurries', $flurries, $contentW);
						    $contentW = str_replace('Foggy', $fog, $contentW);
						    $contentW = str_replace('Hazy', $hazy, $contentW);
						    $contentW = str_replace('Mostly Cloudy', $mostlycloudy, $contentW);
						    $contentW = str_replace('Mostly Sunny', $mostlysunny, $contentW);
						    $contentW = str_replace('Partly Cloudy', $partlycloudy, $contentW);
						    $contentW = str_replace('Partly Sunny', $partlysunny, $contentW);
						    $contentW = str_replace('Sleet', $sleet, $contentW);
						    $contentW = str_replace('Sunny', $sunny, $contentW);
						    $contentW = str_replace('Thunderstorm', $tstorms, $contentW);
						    $contentW = str_replace('Unknown', $unknown, $contentW);
						    $contentW = str_replace('Today', $today, $contentW);
						    return $contentW;
						}
						add_filter('wp_wunderground_forecast', 'replace_weather');

?>