<?php
require_once 'config.php';
class Gallery
{
    // property, attrs, fields, member vars
    private $galleryID;
    private $flag;
    private $imageName;
    private $imageTmp;
    // behavior, member function, method, action
    public function __construct($flag, $imageName, $imageTmp="", $galleryID="")
    {
        $this->flag = $flag;
        $this->imageName = $imageName;
        $this->imageTmp = $imageTmp;
	$this->galleryID = $galleryID;
    }
    public function addImage()
    {
        if(is_uploaded_file($this->imageTmp)){
            // rename image
            $this->imageName = time().$this->imageName;
            if(move_uploaded_file($this->imageTmp, "APP/upload/".$this->imageName)){
                // get connection
                global $dbh;
                $sql = $dbh->prepare("INSERT INTO gallery(flag, image) VALUES('$this->flag', '$this->imageName')");
                if($sql->execute()){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public static function deleteImage($flag , $imageName)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM gallery WHERE flag = '$flag' AND image='$imageName'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteImageByImageID($galleryID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM gallery WHERE galleryID = '$galleryID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteAllImagesByFlag($flag)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM gallery WHERE flag = '$flag'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function retreiveAllImagesByFlag($flag)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT image FROM gallery where flag='$flag'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $imagesData = $sql->fetchAll(PDO::FETCH_ASSOC);
        // convert two dimension to one dimension
        $allImages = null;
        if(is_array($imagesData) && count($imagesData)>0){
            foreach($imagesData as $imageNews):
                $allImages[] = $imageNews['image'];
            endforeach;
        }
        return $allImages;
    }
    public static function retreiveALLImages()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT image FROM gallery");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $imagesData = $sql->fetchALL(PDO::FETCH_ASSOC);
        // convert two dimension to one dimension
        $allImages = null;
        if(is_array($imagesData) && count($imagesData)>0){
            foreach($imagesData as $imageNews):
                $allImages[] = $imageNews['image'];
            endforeach;
        }
        return $allImages;
    }
   
}
