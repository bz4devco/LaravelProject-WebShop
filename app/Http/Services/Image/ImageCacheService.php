<?php

namespace App\Http\Services\Image;

use PersianRender\PersianRender;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;

class ImageCacheService
{


    public function cache($imagePath, $size = '')
    {
        //set image size
        $imageSizes = Config::get('image.cache-image-sizes');
        if(!isset($imageSizes[$size]))
        {
            $size = Config::get('image.default-current-cache-image');
        }
        $width = $imageSizes[$size]['width'];
        $height = $imageSizes[$size]['height'];



     


        //cache image
        if(file_exists($imagePath))
        {
            $img = Image::cache(function($image) use ($imagePath, $width, $height) {
                return $image->make($imagePath)->fit($width, $height);
            }, Config::get('image-cache-life-time'), true);
            return $img->response();
        }
        else{
            $img = Image::canvas($width, $height, '#cdcdcd')->text('404 - ' .$this->persianRender('تصویر یافت نشد'), $width / 2, $height / 2, function($font){

                $font->color('#333333');
                $font->align('center');
                $font->valign('center');
                $font->file(public_path('admin-assets/fonts/IRANSans/IRANSansWeb.woff'));
                $font->size(24);
            });
            return $img->response();
        }

    }


    protected function persianRender($text)
    {
        $persian_text_rev = PersianRender::render($text);

        $persian_text = '';
        for ($i = mb_strlen($persian_text_rev); $i>=0; $i--) {
            $persian_text .= mb_substr($persian_text_rev, $i, 1);
        }
        return $persian_text;
    }

}