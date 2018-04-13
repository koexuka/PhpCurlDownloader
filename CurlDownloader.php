<?php
class CurlDownloader
{
	public static function downloadAndSave($url, $savepath)
	{   
		$fp = fopen($savepath, "w");
		if (!$fp)
		{   
			return false;
		}   
		$option = [ 
			CURLOPT_TIMEOUT         => 10, 
			CURLOPT_RETURNTRANSFER  => true,
			CURLOPT_FILE            => $fp,
		];  
		$ch = curl_init($url);
		curl_setopt_array($ch, $option);
		$data = curl_exec($ch);
		$errNo= curl_error($ch);
		curl_close($ch);
		fclose($fp);

		if (!$data)
		{   
			return false;
		}   
		if ($errNo!=CURLE_OK)
		{   
			return false;
		}   

		return true;
	}   
}
