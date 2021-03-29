<?php
require_once 'APP/model/DatabaseModel.php';
class SR extends DatabaseModel
{
    // property
    protected $srID;
    protected $shortCode;
    protected $type;
    protected $area;
    protected $subarea;
    protected $product;
    protected $flag;
    // table name
    protected static $tableName = "sr";
    // all fields in tabel
    protected $tableFields = array(
        'shortCode',
        'type',
	'area',
        'subarea',
        'product',
        'flag'
    );
    public function __construct($shortCode, $type, $area, $subarea, $product, $flag, $srID="")
    {
        $this->shortCode = $shortCode;
        $this->type = $type;
	$this->area = $area;
        $this->subarea = $subarea;
        $this->product = $product;
        $this->flag = $flag;
        $this->srID = $srID;
    }
    public static function retrieveSRsOrderByFlag()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM sr ORDER BY flag");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public static function retrieveSRsByFlag($flag)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM sr WHERE flag='$flag'");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}
