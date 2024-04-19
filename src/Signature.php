<?php

namespace Src;
class Signature
{
    protected array $signaturePixels = [];
    protected \GdImage $image;
    protected \GdImage $signature;
    public function detect(\GdImage $image): void
    {
        $this->image = $image;

        $width = imagesx($this->image);
        $height = imagesy($this->image);

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($this->image, $x, $y);
                $colors = imagecolorsforindex($this->image, $rgb);

                if ($colors['red'] < 50 && $colors['green'] < 50 && $colors['blue'] < 50) {
                    $this->signaturePixels[] = [$x, $y];
                }
            }
        }

        $minX = $width;
        $maxX = 0;
        $minY = $height;
        $maxY = 0;

        foreach ($this->signaturePixels as $pixel) {
            $minX = min($minX, $pixel[0]);
            $maxX = max($maxX, $pixel[0]);
            $minY = min($minY, $pixel[1]);
            $maxY = max($maxY, $pixel[1]);
        }

        $signatureWidth = $maxX - $minX + 1;
        $signatureHeight = $maxY - $minY + 1;

        $this->signature = imagecreatetruecolor($signatureWidth, $signatureHeight);

        imagealphablending($this->signature, false);
        imagesavealpha($this->signature, true);
        $transparentColor = imagecolorallocatealpha($this->signature, 0, 0, 0, 127);
        imagefill($this->signature, 0, 0, $transparentColor);

        foreach ($this->signaturePixels as $pixel) {
            imagesetpixel($this->signature, $pixel[0] - $minX, $pixel[1] - $minY, imagecolorallocate($this->signature, 0, 0, 0));
        }
    }

    public function save(string $filename):void
    {
        imagepng($this->signature, $filename);

        imagedestroy($this->image);
        imagedestroy($this->signature);
    }
}