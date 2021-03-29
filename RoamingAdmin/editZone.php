<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/zone.php';
?>
    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header"><a class="link" href="zones.php">Zones</a> / Edit Zone</P>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="container">
            <div class="left-container">
                <?php
                    require_once 'APP/template/navbar.tpl';
                ?>
            </div>
            <div class="right-container">
                <div class="well">
                    <div class="form-container">
                        
                        <?php
                            if(isset($_POST['edit'])){
                                $zoneID = $_POST['zoneID'];
                                $localMin = $_POST['localMin'];
                                $internationalMin = $_POST['internationalMin'];
                                $backHomeMin = $_POST['backHomeMin'];
                                $sms = $_POST['sms'];
                                $RecMin = $_POST['RecMin'];
                                $dataMB = $_POST['dataMB'];
                                $videoCallMin = $_POST['videoCallMin'];
                                $videoCallRecMin = $_POST['videoCallRecMin'];
                                if($zoneID == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Zone ID, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($zoneID)){
                                    echo '<div class="red">
                                            <p>ZoneID must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($localMin == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Local Minute, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($localMin)){
                                    echo '<div class="red">
                                            <p>Local Minute must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($internationalMin == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter International Minute, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($internationalMin)){
                                    echo '<div class="red">
                                            <p>International Minute must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($backHomeMin == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Back home Minute, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($backHomeMin)){
                                    echo '<div class="red">
                                            <p>Back Home Minute must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($sms == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter SMS, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($sms)){
                                    echo '<div class="red">
                                            <p>SMS must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($RecMin == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Receiving Minute, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($RecMin)){
                                    echo '<div class="red">
                                            <p>Receiving Minute must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($dataMB == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Data/MB, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($dataMB)){
                                    echo '<div class="red">
                                            <p>Data/MB must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($videoCallMin == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Video Call Minute, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($videoCallMin)){
                                    echo '<div class="red">
                                            <p>Video Call Minute must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($videoCallRecMin == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Video Call Reciving Minute, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($videoCallRecMin)){
                                    echo '<div class="red">
                                            <p>Video Call Reciving Minute must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }else{
                                    $zone = new Zone($localMin, $internationalMin, $backHomeMin, $sms, $RecMin, $dataMB, $videoCallMin, $videoCallRecMin, $zoneID);
                                    if($zone->update($zoneID)){
                                        header("location: editZone.php?zoneID=".$zoneID."&flag=1");
                                        exit();
                                    }else{
                                        header("location: editZone.php?zoneID=".$zoneID."&flag=0");
                                        exit();
                                    }
                                }
                                
                            }
                            if(isset($_GET['flag'])){
                                if($_GET['flag'] == 1){
                                    echo '<div class="green">
                                        <p>The Zone has been updated Successfully !</p>
                                    </div>';
                                }else{
                                    echo '<div class="red">
                                        <p>The Zone is not updated, Please try again !</p>
                                    </div>';
                                }
                            }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" accept-charset="utf-8">
                            <?php
                                if(isset($_GET['zoneID'])){
                                    $zone = Zone::readById($_GET['zoneID']);
                                    echo '<div class="headers">
                                            Zone '.$zone['zoneID'].'
                                            </div>
                                            <input type="hidden" name="zoneID" value="'.$_GET['zoneID'].'" />
                                            <div class="form-group">
                                                    <label for="exampleInputText">Local Minute</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Local Minute" name="localMin" value="'.$zone['localMin'].'">
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputText">International Minute</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter International Minute" name="internationalMin" value="'.$zone['internationalMin'].'">
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputText">Back Home Minute</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Back Home Minute" name="backHomeMin" value="'.$zone['backHomeMin'].'">
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputText">Receiving Minute</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Receiving Minute" name="RecMin" value="'.$zone['RecMin'].'">
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputText">SMS</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter SMS" name="sms" value="'.$zone['sms'].'">
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputText">Data MB</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Data MB" name="dataMB" value="'.$zone['dataMB'].'">
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputText">Video Call Minute</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Video Call Minute" name="videoCallMin" value="'.$zone['videoCallMin'].'">
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputText">Video Call Receiving Minute</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Video Call Receiving Minute" name="videoCallRecMin" value="'.$zone['videoCallRecMin'].'">
                                            </div>
                                            <button type="submit" class="btn btn-secondary btn-lg btn-block" name="edit" value="edit">EDIT</button>';
                                }
                            ?>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once 'APP/template/footer.tpl';
?>