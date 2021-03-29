<?php
require_once 'APP/model/DatabaseModel.php';
class Hardtoreach extends DatabaseModel
{
    // property
    protected $hardToReachID;
    protected $zoneID;
    protected $countryID;
    // table name
    protected static $tableName = "hardToReach";
    // all fields in tabel
    protected $tableFields = array(
        'zoneID',
        'countryID'
    );
    public function __construct($zoneID, $countryID, $hardToReachID="")
    {
        $this->zoneID = $zoneID;
        $this->countryID = $countryID;
        $this->hardToReachID = $hardToReachID;
    }
    public static function retrieveByCountryID($countryID){
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM hardtoreach WHERE countryID='$countryID'");
        if($sql->execute()){
            return $sql->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public static function deleteCountriesByZoneID($zoneID)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM hardtoreach WHERE zoneID='$zoneID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
}
