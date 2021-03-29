<?php
require_once 'APP/model/DatabaseModel.php';
class Script extends DatabaseModel
{
    // property
    protected $scriptID;
    protected $head;
    protected $script;
    protected $flag;
    // table name
    protected static $tableName = "script";
    // all fields in tabel
    protected $tableFields = array(
        'head',
        'script',
        'flag'
    );
    public function __construct($head, $script, $flag, $scriptID="")
    {
        $this->head = $head;
        $this->script = $script;
        $this->flag = $flag;
        $this->scriptID = $scriptID;
    }
    public static function retrieveScriptsByFlag($flag)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM script WHERE flag='$flag'");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public static function retrieveScriptsOrderByFlag()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM script ORDER BY flag");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}
