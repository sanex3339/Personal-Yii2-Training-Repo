<?php
  namespace sanex\hexal\components;

  Class Hexal
  {
    private $fileName, $filePath, $saveName, $savePath, $tempPath;

    function __construct($heightSize = 206, $fileName, $filePath = NULL, $saveName, $savePath = NULL)
    {
      $this->fileName = $fileName;
      $this->saveName = $saveName;
      
      //Check filepath for exist
      if ($this->checkPath($filePath))
      {
        $this->filePath = $this->tempPath;
      }

      //Check save path for exist
      if ($this->checkPath($savePath))
      {
        $this->savePath = $this->tempPath;
      }

      //run
      $this->initHexagon($heightSize);
    }

    private function initHexagon($heightSize)
    {
      //open image
      if (!$rawImage = imagecreatefromjpeg($this->filePath.$this->fileName))
      {
        throw new Exception("Invalid image path or image name!", 1);
      } 

      //set save path
      $savePath = $this->savePath.$this->saveName;

      //get image W and H
      $w = imagesx($rawImage); 
      $h = imagesy($rawImage);

      //set crop W and H. 2x value for resampling.
      $cropW = $cropH = $heightSize * 2;

      //set new W and H for mask hexagon points
      $newW = $cropW;
      $newH = $cropH;

      //get size
      $size = max($w, $h);

      //set offsets for center image, depends on image W or H

      //if W > H - move image left
      if ($w > $h)
      {
        $aspectW = ($w / $h) * $cropW;
        $aspectH = $cropH;

        $xResultOffset = ($size - $w) / 2;
        $xTarget = ($w - $h) / 2;
        $yResultOffset = 0;
        $yTarget = 0;
      } elseif ($w < $h) { //if H > W - move image top
        $aspectW = $cropW;
        $aspectH = ($h / $w) * $cropH;

        $xResultOffset = 0;
        $xTarget = 0;
        $yResultOffset = ($size - $h) / 2;
        $yTarget = ($h - $w) / 2;
      } elseif ($w = $h) {
        $aspectW = $cropW;
        $aspectH = $cropH;

        $xResultOffset = (($size - $w) / 2) - ($w * 0.134);
        $xTarget = 0;
        $yResultOffset = 0;
        $yTarget = 0;
      }

      //resize image
      $resizedImage = imagecreatetruecolor($cropW, $cropH);
      imagecopyresized($resizedImage, 
                $rawImage,
                $xResultOffset,
                $yResultOffset, 
                $xTarget,
                $yTarget,
                $aspectW,
                $aspectH,
                $w,
                $h  
      );

      //destroy raw image
      imagedestroy($rawImage);

      /* Simple math here

        A_____F
        /     \
      B/       \E
       \       /
       C\_____/D

      */

      //set points for hexagon mask
      $points = array(
          .433 * $newW, 0, // A 
          0, .25   * $newW, // B
          0, .75  * $newW, // C
          .433 * $newW, $newW - 1, // D
          .866 * $newW, .75  * $newW, // E
          .866 * $newW, .25  * $newW  // F
      );

      //90 grad rotate
      //$points = array(
      //    .25 * $new_w, .067  * $new_w, // A 
      //    0, .5   * $new_w, // B
      //    .25 * $new_w, .933  * $new_w, // C
      //    .75 * $new_w, .933  * $new_w, // D
      //    $new_w, .5  * $new_w, // E
      //    .75 * $new_w, .067  * $new_w  // F
      //);

      // Create the mask
      $mask = imagecreatetruecolor($newW, $newW);
      imagefilledpolygon($mask, $points, 6, imagecolorallocate($mask, 255, 0, 0));

      // Create the new image with a transparent bg
      $image = imagecreatetruecolor($newW * 0.87, $newW);
      $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
      imagealphablending($image, false);
      imagesavealpha($image, true);
      imagefill($image, 0, 0, $transparent);

      // Iterate over the mask's pixels, only copy them when its red.
      // Note that you could have semi-transparent colors by simply using the mask's 
      // red channel as the original color's alpha.
      for($x = 0; $x < $newW; $x++) {
          for ($y = 0; $y < $newW; $y++) { 
              $m = imagecolorsforindex($mask, imagecolorat($mask, $x, $y));
              if($m['red']) {
                  $color = imagecolorsforindex($resizedImage, imagecolorat($resizedImage, $x, $y));
                  imagesetpixel($image, $x, $y, imagecolorallocatealpha($image,
                                    $color['red'], $color['green'], 
                                    $color['blue'], $color['alpha']));
              }
          }
      }

      //destroy resized image
      imagedestroy($resizedImage);

      //resample image
      $resampleImage = imagecreatetruecolor(($newW / 2) * 0.87, $newW / 2);
      imagealphablending($resampleImage, false );
      imagesavealpha($resampleImage, true );
      imagecopyresampled($resampleImage, $image, 0, 0, 0, 0, ($newW / 2) * 0.87, $newW / 2, $newW * 0.866, $newW);

      //destroy image
      imagedestroy($image);

      // save the result
      //header('Content-type: image/png');
      //imagepng($resampleImage);
      imagepng($resampleImage, $savePath);
      imagedestroy($resampleImage);
    }

    private function checkPath($path)
    {
      //empty path check
      if (empty($path))
      {
        $this->tempPath = $path;
        return true;
      }

      //remove first slash
      if (mb_substr($path, 0, 1) == '/')
      {
        $path = explode('/', $path, 2);
        if (count($path)>1)
        {
          $path = $path[1];
        } else {
          $path = $path[0];
        }
      }

      //add last slash if not exist
      if (mb_substr($path, -1) != '/')
      {
        $path = $path.'/';
      }

      //check dir
      if (is_dir($path))
      {
        $this->tempPath = $path;
        return true;
      } else {
        throw new Exception("Wrong directory name or directory not exist", 1);  
      }
    }
  }