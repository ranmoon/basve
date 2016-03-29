<?php

/**
 * 
 */

class Image{


	public function createdir($dir){
		if(file_exists($dir)){
			if(!is_dir($dir)){
				mkdir($dir,0777);
			}
		}else{
			mkdir($dir,0777);
		}
	}

	public function createImg($bgimg, $header){
		list($max_width,$max_height) = getimagesize($bgimg);
		$dests = imagecreatetruecolor($max_width,$max_height);
		$des_img = imagecreatefrompng($bgimg);
		imagecopy($dests,$des_img,0,0,0,0,$max_width,$max_height);
		imagedestroy($des_img);

		//头像
		$src_im = imagecreatefrompng($header);
		$src_info = getimagesize($header);
		imagecopy($dests,$src_im,$max_width/2,$max_height/2,0,0,100,100);
		imagedestroy($src_im);


		//字体,兼容中文
		$text = iconv('GB2312',"UTF-8",'ranmoon');
		//设定字体
		$font = 'font/consola.ttf';
		//字体颜色
		$grey = imagecolorallocate($dests,255,255,255);

		imagettftext($dests,19,0,20,200,$grey,$font,$text);
		//var_dump($tb);

		header('content-type:image/png');
		imagejpeg($dests);



	}

	public function getCreateImg(){
		echo 1;
	}
}