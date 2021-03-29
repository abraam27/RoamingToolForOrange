<?php
require_once 'APP/model/DatabaseModel.php';
class Country extends DatabaseModel
{
    // property
    protected $countryID;
    protected $engName;
    protected $arabName;
    protected $dataZoneID;
    protected $zoneID;
    // table name
    protected static $tableName = "country";
    // all fields in tabel
    protected $tableFields = array(
        'engName',
        'arabName',
        'dataZoneID',
	'zoneID'
    );
    public function __construct($engName, $arabName, $dataZoneID, $zoneID, $countryID="")
    {
        $this->engName = $engName;
        $this->arabName = $arabName;
        $this->dataZoneID = $dataZoneID;
        $this->zoneID = $zoneID;
        $this->countryID = $countryID;
    }
    public static function retrieveCountriesOrderByEngName()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM country order by engName");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public static function deleteCountriesByZoneID($zoneID)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM country WHERE zoneID='$zoneID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function retrieveCountriesByZoneID($zoneID)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM country WHERE zoneID='$zoneID' order by engName");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}
