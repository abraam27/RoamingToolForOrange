<?php
require_once 'APP/model/DatabaseModel.php';
class Zone extends DatabaseModel
{
    // property
    protected $zoneID;
    protected $localMin;
    protected $internationalMin;
    protected $backHomeMin;
    protected $sms;
    protected $RecMin;
    protected $dataMB;
    protected $videoCallMin;
    protected $videoCallRecMin;
    // table name
    protected static $tableName = "zone";
    // all fields in tabel
    protected $tableFields = array(
        'localMin',
        'internationalMin',
	'backHomeMin',
        'sms',
        'RecMin',
        'dataMB',
        'videoCallMin',
        'videoCallRecMin'
    );
    public function __construct($localMin, $internationalMin, $backHomeMin, $sms, $RecMin, $dataMB, $videoCallMin, $videoCallRecMin, $zoneID="")
    {
        $this->localMin = $localMin;
        $this->internationalMin = $internationalMin;
	$this->backHomeMin = $backHomeMin;
        $this->sms = $sms;
        $this->RecMin = $RecMin;
        $this->dataMB = $dataMB;
        $this->videoCallMin = $videoCallMin;
        $this->videoCallRecMin = $videoCallRecMin;
        $this->zoneID = $zoneID;
    }
    public static function checkZoneID($zoneID)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM " . static::$tableName . " WHERE ".static::$tableName."ID='$id'");
        if($sql->execute()){
            $zone = $sql->fetch(PDO::FETCH_ASSOC);
            return $zone['zoneID'];
        }else{
            return false;
        }
    }
}
