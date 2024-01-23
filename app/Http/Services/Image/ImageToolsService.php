<?php

namespace App\Http\Services\Image;

use Directory;

class ImageToolsService
{
    protected $image;

    protected $exclusiveDirectory;
    protected $imageDirectory;

    protected $imageName;
    protected $imageFormat;

    protected $finalImageDirectory;
    protected $finalImageName;

    public function resetProperties()
    {
        $this->image = null;
        $this->exclusiveDirectory = null;
        $this->imageDirectory = null;
        $this->imageName = null;
        $this->imageFormat = null;
        $this->finalImageDirectory = null;
        $this->finalImageName = null;
    }


    // set orginal image in image property scope

    public function setImage($image)
    {
        $this->image = $image;
    }


    //--------------   Directory

    //---------- Exclusive Directory

    // get Exclusive Directory from class method
    public function getExclusiveDirectory()
    {
        return $this->exclusiveDirectory;
    }

    // set Exclusive Directory with argument method
    public function setExclusiveDirectory($exclusiveDirectory)
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory, '/\\');
    }


    //---------- Image Directory
    // get Image Directory from class method
    public function getImageDirectory()
    {
        return $this->imageDirectory;
    }

    // set Image Directory with argument method
    public function setImageDirectory($imageDirectory)
    {
        $this->imageDirectory = trim($imageDirectory, '/\\');
    }

    //--------------   Directory


    // **************************************


    //--------------   File Name

    //--------------  Image Name
    // get Image Name from class method
    public function getImageName()
    {
        return $this->imageName;
    }

    // set Image Name with argument method
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    //- ---------  Current Image Name 
    // set Current Image Name with argument method
    public function setCurrentImageName()
    {
        return !empty($this->image) ? $this->setImageName(pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME)) : false;
        // $_FILES['image']['name']
    }


    //------------  Image Format
    // get Image Format from class method
    public function getImageFormat()
    {
        return $this->imageFormat;
    }

    // set Image Format with argument method
    public function setImageFormat($imageFormat)
    {
        $this->imageFormat = $imageFormat;
    }
    //--------------   File Name




    // **************************************




    //--------   Final Image Directory

    // get Final Image Directory from class method
    public function getFinalImageDirectory()
    {
        return $this->finalImageDirectory;
    }

    // set Final Image Directory with argument method
    public function setFinalImageDirectory($finalImageDirectory)
    {
        $this->finalImageDirectory = $finalImageDirectory;
    }
    //--------   Final Image Directory




    // **************************************




    //--------   Final Image Name

    // get Final Image Name from class method
    public function getFinalImageName()
    {
        return $this->finalImageName;
    }

    // set Final Image Name with argument method
    public function setFinalImageName($finalImageName)
    {
        $this->finalImageName = $finalImageName;
    }
    //--------   Final Image Name




    // **************************************

    //--------  Check Directory Exsist
    // get Image Direcrtory and check has this Directory
    protected function checkDirectory($imageDirectory)
    {
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0755, true);
        }
    }



    // **************************************


    //--------  Create Full Address of Image Sercive

    // this method get Final Image Directory and set (/) and attached Final Image Name
    public function getImageAddress()
    {
        return $this->finalImageDirectory . DIRECTORY_SEPARATOR . $this->finalImageName;
    }





    // **************************************
    // **************************************



    // orginal method of This Class for Usage method
    protected function provider()
    {
        //set properties
        $this->getImageDirectory() ?? $this->setImageDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->getImageName() ?? $this->setImageName(time());
        $this->getImageFormat() ?? $this->setImageFormat($this->image->extension());


        //set final image Directory
        $finalImageDirectory = empty($this->getExclusiveDirectory()) ? $this->getImageDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getImageDirectory();
        $this->setFinalImageDirectory($finalImageDirectory);


        //set final image name
        $this->setFinalImageName($this->getImageName() . '.' . $this->getImageFormat());


        //check adn create final image directory
        $this->checkDirectory($this->getFinalImageDirectory());
    }
}
