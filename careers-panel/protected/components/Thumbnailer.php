<?php

Yii::setPathOfAlias('Imagine',Yii::getPathOfAlias('application.vendor.Imagine'));

class Thumbnailer
{
    /**
     * GD2 driver definition for Imagine implementation using the GD library.
     */
    const DRIVER_GD2 = 'gd2';
    /**
     * imagick driver definition.
     */
    const DRIVER_IMAGICK = 'imagick';
    /**
     * gmagick driver definition.
     */
    const DRIVER_GMAGICK = 'gmagick';
    /**
     * @var array|string the driver to use. This can be either a single driver name or an array of driver names.
     * If the latter, the first available driver will be used.
     */
    public static $driver = array(self::DRIVER_GMAGICK, self::DRIVER_IMAGICK, self::DRIVER_GD2);

    /**
     * @var ImagineInterface instance.
     */
    private static $_imagine;
    /**
    * // https://github.com/liip-forks/Imagine/blob/b3705657f1e4513c6351d3aabc4f9efb7f415803/lib/Imagine/Imagick/Image.php#L703
    * png图片resize压缩的质量，范围为  0-9，数越大，质量越高，图片文件的容量越大
    */
    public $pngCompressionLevel = 8;
    /**
     * https://github.com/liip-forks/Imagine/blob/b3705657f1e4513c6351d3aabc4f9efb7f415803/lib/Imagine/Imagick/Image.php#L676
     * https://secure.php.net/manual/zh/imagick.setimagecompressionquality.php
     * 'jpeg', 'jpg', 'pjpeg' 格式图片进行压缩的质量数，范围：1-100，数越大，质量越高，图片文件的容量越大
     */
    public $jpegQuality = 80;

    public function init()
   {
     $this->pngCompressionLevel ;
     $this->jpegQuality;
   }
    /**
     * Returns the `Imagine` object that supports various image manipulations.
     * @return ImagineInterface the `Imagine` object
     */
    public static function getImagine()
    {
        if (self::$_imagine === null) {
            self::$_imagine = static::createImagine();
        }

        return self::$_imagine;
    }


    /**
     * @param ImagineInterface $imagine the `Imagine` object.
     */
    public static function setImagine($imagine)
    {
        self::$_imagine = $imagine;
    }

    /**
     * Creates an `Imagine` object based on the specified [[driver]].
     * @return ImagineInterface       the new `Imagine` object
     * @throws \CException if [[driver]] is unknown or the system doesn't support any [[driver]].
     */
    protected static function createImagine()
    {
        return new Imagine\Gd\Imagine();
    }

    /**
     * Crops an image.
     *
     * For example,
     *
     * ~~~
     * $obj->crop('path\to\image.jpg', 200, 200, [5, 5]);
     *
     * $point = new \Imagine\Image\Point(5, 5);
     * $obj->crop('path\to\image.jpg', 200, 200, $point);
     * ~~~
     *
     * @param  string                $filename the image file path or path alias.
     * @param  integer               $width    the crop width
     * @param  integer               $height   the crop height
     * @param  array                 $start    the starting point. This must be an array with two elements representing `x` and `y` coordinates.
     * @return ImageInterface
     * @throws \CException if the `$start` parameter is invalid
     */
    public static function crop($filename, $width, $height, array $start = array(0, 0))
    {
        if (!isset($start[0], $start[1])) {
            throw new \CException('$start must be an array of two elements.');
        }

        return static::getImagine()
            ->open($filename)
            ->copy()
            ->crop(new Imagine\Image\Point($start[0], $start[1]), new Imagine\Image\Box($width, $height));
    }

    /**
     * Creates a thumbnail image. The function differs from [[\Imagine\Image\ImageInterface::thumbnail()]] function that
     * it keeps the aspect ratio of the image.
     * @param  string         $filename the image file path or path alias.
     * @param  integer        $width    the width in pixels to create the thumbnail
     * @param  integer        $height   the height in pixels to create the thumbnail
     * @param  string         $mode
     * @return ImageInterface
     */
    public  function thumbnail($filename, $width, $height)
    {
      $imagine = new Imagine\Gd\Imagine();
      $mode = Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND;
      $box = new Imagine\Image\Box($width, $height);
        //$img = static::getImagine()->open($filename);

         $img = $imagine->open($filename);

        if (($img->getSize()->getWidth() <= $box->getWidth() && $img->getSize()->getHeight() <= $box->getHeight()) || (!$box->getWidth() && !$box->getHeight())) {
            return $img->copy();
        }

        $img = $img->thumbnail($box, $mode);

        // create empty image to preserve aspect ratio of thumbnail
        $color = new Imagine\Image\Palette\RGB();

        //  $thumb = static::getImagine()->create($box, $color->color('FFF', 100));
       $thumb = $imagine->create($box, $color->color('FFF', 100));


        // calculate points
        $size = $img->getSize();

        $startX = 0;
        $startY = 0;
        if ($size->getWidth() < $width) {
            $startX = ceil($width - $size->getWidth()) / 2;
        }
        if ($size->getHeight() < $height) {
            $startY = ceil($height - $size->getHeight()) / 2;
        }

        $thumb->paste($img, new Imagine\Image\Point($startX, $startY));

        return $thumb;
    }



    public function resize($filename, $width, $height)
    {
        //$image = static::getImagine()->open($filename);
        $imagine = new Imagine\Gd\Imagine();
        $image  = $imagine->open($filename);

        $realWidth = $image->getSize()->getWidth();
        $realHeight = $image->getSize()->getHeight();

        if ($realWidth > $width || $realHeight > $height) {
            $ratio = $realWidth / $realHeight;

            if ($ratio > 1) {
                $height = $width / $ratio;
            } else {
                $width = $height * $ratio;
            }

            $image->resize(new Imagine\Image\Box($width, $height));
        }

        return $image;
    }
}
