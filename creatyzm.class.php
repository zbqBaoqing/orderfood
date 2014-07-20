<?php
session_start();
$_SESSION[check_yzm]="";   //将获取的随机数验证码写入到SESSION变量中    


class creatyzm{
	private $image_x;
	private $image_y;
	private $font;
	private $fontcolor;
	private $angle;
	private $fontsize;
	private $pixelnum;	//噪点数
	private $ychar=array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','G','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

public function __construct(){
	$this->image_x=110;
	$this->image_y=37;
	$this->font="fonts/QuoVadisQuasimodo.ttf";
	$this->fontcolor=mt_rand(0,255);
	$this->fontsize=20;
	$this->angle=20;
	$this->pixelnum=250;

 header("content-type:text/html;charset=utf-8");
 header("content-type:image/png");

}

public function createYZM(){
	$im = imagecreate($this->image_x, $this->image_y) or die("Cant's initialize new GD iage stream!");
	$gray = imagecolorallocate($im, 200, 200, 200);
	imagefill($im,0,0,$gray);

	for ($i = 0; $i < 4; $i++){
		$randnum = mt_rand(0,35);
		$authnum .= $this->ychar[$randnum];
	}
	$_SESSION[check_yzm]= $authnum;

	imagettftext($im,$this->fontsize,$this->angle, 20, 20,imagecolorallocate($im, mt_rand(0,255), mt_rand(0,150), mt_rand(0,200)), $this->font, $authnum[0]);
	imagettftext($im,$this->fontsize,$this->angle, 40, 25,imagecolorallocate($im,mt_rand(0,255), mt_rand(0,150), mt_rand(0,200)), $this->font, $authnum[1]);
	imagettftext($im,$this->fontsize,$this->angle, 60, 30,imagecolorallocate($im, mt_rand(0,255), mt_rand(0,150), mt_rand(0,200)), $this->font, $authnum[2]);
	imagettftext($im,$this->fontsize,$this->angle, 84, 34,imagecolorallocate($im,mt_rand(0,255), mt_rand(0,150), mt_rand(0,200)), $this->font, $authnum[3]);
	imageline($im, 10, 5, 100, 34, imagecolorallocate($im, mt_rand(10,200), mt_rand(100,200), mt_rand(100,200)));
	imageline($im, 10, 28, 100, 15, imagecolorallocate($im, 0, mt_rand(100,200), mt_rand(100,200)));
	for($i=0; $i < $this->pixelnum; $i++ ){
		imagesetpixel($im, mt_rand()%110, mt_rand()%37, imagecolorallocate($im, 0, mt_rand(0,255), mt_rand(0,255)));
	}
	imagepng($im);
	imagedestroy($im);
	}

}
 $yzm = new creatyzm();
 $yzm->createYZM();
 $yzm=null;
?>
