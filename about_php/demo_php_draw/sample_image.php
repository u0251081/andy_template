<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/7/30
 * Time: 下午 07:40
 */
/*
 * header('Content-type:image/圖形格式');
 * $圖檔變數 = ImageCreate(水平大小,垂直大小);
 * ImageXXX($圖檔變數);
 * ImageDestroy($圖檔變數);
 */
$width = 900;
$height = 600;
// imageCreate(width:int, height:int);
$image = imageCreate($width,$height);
// $fileName = 'someFile'; // file to save output of imagePNG
$fileName = null;
$quality = 0; // quality 0(no compression) to 9 default 6
$red = 0; // 0 ~ 255
$green = 0; // 0 ~ 255
$blue = 0; // 0 ~ 255
$alpha = 0; // 0 ~ 127
$font = 0; // 0 ~ 5 inner defined font
$black = ImageColorAllocate($image, $red,$green,$blue);
// imageColorAllocate(image,red:int,green:int,blue:int);
$imageRed = imagecolorallocate($image,255,0,0);
$imageYang = imagecolorallocate($image,0,255,255);
$textColor = imagecolorallocatealpha($image,255,255,255,0);
ImageFill($image,0,0,$black);
$str_line = 'ImageLine($image, x1, y1, x2, y2, $color);';
imagestring($image,5,0,0,$str_line,$textColor);
imageline($image,0,20,900,20,$imageRed);
$str_arc = 'ImageArc($image, cx, cy, width, height, start, end, $color);';
imagestring($image,5,50,40,$str_arc,$textColor);
imagearc($image,450,50,900,50,0,360,$imageRed);
$str_rec = 'ImageRectangle($image,x1,y1,x2,y2,$color);';
imagestring($image,5,0,162,$str_rec,$textColor);
imagerectangle($image,0,160,899,180,$imageRed);
$poly = array(450,195+5,420,195+45,490,195+20,410,195+20,480,195+45);
$str_poly = '$poly = array(450,195+5,420,195+45,490,195+20,410,195+20,480,195+45);';
$str_imP = 'ImagePolygon($image,$poly,count($poly)/2,$imageRed);';
imagestring($image,5,0,250,$str_poly,$textColor);
imagestring($image,5,0,270,$str_imP,$textColor);
imagepolygon($image,$poly,count($poly)/2,$imageRed);

/*
 * IMG_ARC_PIE produces a rounded edge.
 * IMG_ARC_CHORD connects the starting and ending angles with a straight line.
 * IMG_ARC_NOFILL indicates that the arc or chord should be outlined, not filled.
 * IMG_ARC_EDGED indicates that the beginning and ending angles should be connected to the center.
 */
imagefilledarc($image,450,150,900,100,225,315,$imageRed,IMG_ARC_PIE+IMG_ARC_NOFILL+IMG_ARC_EDGED);
imagefilledarc($image,450,150,900,100,225,315,$imageRed,IMG_ARC_CHORD+IMG_ARC_NOFILL);

header('content-type:image/png');
imagepng($image);
// imageFill(image: return by createImageFunction, x, y, color: return by ImageColorAllocateFunction);
// imagePNG(image: return by createImageFunction, filename: output file of this function, quality: int,filters:);
// imagecolortransparent(image: image,color:int);
// imagecolortransparent($image,$black); // 把指定顏色轉為父顏色(透明);
/*
 * imagejpeg(image,filename,quality);
 * imagebmp(image,filename,compressed:bool);
 * imagegif(image,filename);
 * imagettftext(resource image, float size, float angle, int x, int y, int color, string fontFile, string text);
ImagePNG($image,$fileName,$quality);
ImageDestroy($image);
imageline(image,x1,y1,x2,y2,color);
imagecolorallocate(image,red,green,blud);
imagecolorallocatealpha(image,red,green,blue,alpha); //alpha 為透明參數
imagecolortransparent(image,color);
imagearc(image,cx,cy,width,height,start_ang,end_ang,color);
imageline(image,x1,y1,x2,y2,color);
imagerectangle(image,x1,y1,x2,y2,color);
//imagepolygon(image,array(x1,y1,x2,y2,...,xn,yn),num_point,color);
imagestring(image,font:int,x,y,string,color); // draw a string horizontally
imagestringup(image,font:int,x,y,string,color); // draw a string vertically
*/
?>