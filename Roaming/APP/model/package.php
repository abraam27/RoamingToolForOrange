<?php
require_once 'APP/model/DatabaseModel.php';
class Package extends DatabaseModel
{
    // property
    protected $packageID;
    protected $packageName;
    protected $fees;
    protected $volume;
    protected $dataZoneID;
    // table name
    protected static $tableName = "package";
    // all fields in tabel
    protected $tableFields = array(
        'packageName',
        'fees',
	'volume',
        'dataZoneID'
    );
    public function __construct($packageName, $fees, $volume, $dataZoneID, $packageID="")
    {
        $this->packageName = $packageName;
        $this->fees = $fees;
	$this->volume = $volume;
        $this->dataZoneID = $dataZoneID;
        $this->packageID = $packageID;
    }
    public static function retrievePackagesByDataZoneID($dataZoneID)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM package WHERE dataZoneID = '$dataZoneID'");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public static function retrievePackagesOrsderByDataZoneID()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM package order by dataZoneID");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public static function deletePackagesByDataZoneID($dataZoneID){
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM package WHERE dataZoneID='$dataZoneID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
}
