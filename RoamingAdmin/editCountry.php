<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/zone.php';
    require_once 'APP/model/country.php';
    require_once 'APP/model/hardtoreach.php';
?>
    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header"><a class="link" href="countries.php">Countries</a> / Edit Country</P>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="container">
            <?php
                require_once 'APP/template/navbar.tpl';
            ?>
            <div class="right-container">
                <div class="well">
                    <div class="form-container">
                        <?php
                            if(isset($_POST['edit'])){
                                $countryID = $_POST['countryID'];
                                $zoneID = $_POST['zoneID'];
                                $dataZoneID = $_POST['dataZoneID'];
                                $engName = $_POST['engName'];
                                $arabName = $_POST['arabName'];
                                $secondZoneID = $_POST['secondZoneID'];
                                $hardToReachID = $_POST['hardToReachID'];
                                if($zoneID == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Zone ID, And try again !</p>
                                        </div>';
                                }elseif($dataZoneID == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Data Zone ID, And try again !</p>
                                        </div>';
                                }elseif($engName == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter English Name, And try again !</p>
                                        </div>';
                                }elseif($arabName == NULL){
                                    echo '<div class="red">
                                            <p>Arabic Name must have Arabic Letters, Please try again !</p>
                                        </div>';
                                }else{
                                    $country = new Country($engName, $arabName, $dataZoneID, $zoneID, $countryID);
                                    if($country->update($countryID)){
                                        if($zoneID == 5){
                                            $hardToReach = new Hardtoreach($secondZoneID, $countryID, $hardToReachID);
                                            if($hardToReach->update($hardToReachID)){
                                                header("location: editCountry.php?countryID=".$countryID."&flag=1");
                                                exit();
                                            }else{
                                                header("location: editCountry.php?countryID=".$countryID."&flag=0");
                                        exit();
                                            }
                                        }
                                    }else{
                                        header("location: editCountry.php?countryID=".$countryID."&flag=0");
                                        exit();
                                    }
                                }
                                
                            }
                            if(isset($_GET['flag'])){
                                if($_GET['flag'] == 1){
                                    echo '<div class="green">
                                        <p>The Country has been updated Successfully !</p>
                                    </div>';
                                }else{
                                    echo '<div class="red">
                                        <p>The Country is not updated, Please try again !</p>
                                    </div>';
                                }
                            }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" accept-charset="utf-8">
                            
                                <?php
                                    if(isset($_GET['countryID'])){
                                        $country = Country::readById($_GET['countryID']);
                                        $hardToReach = Hardtoreach::retrieveByCountryID($_GET['countryID']);
                                        echo'<input type="hidden" name="countryID" value="'.$_GET['countryID'].'" />
                                            <input type="hidden" name="hardToReachID" value="'.$hardToReach['hardToReachID'].'" />
                                            <div class="form-group">
                                            <label for="exampleSelect1">Zone #</label>
                                            <select class="form-control" name="zoneID">
                                                <option selected value="'.$country['zoneID'].'">'.$country['zoneID'].'</option>';
                                                $zones = Zone::readAll();
                                                if(is_array($zones) && count($zones)>0){
                                                    foreach ($zones as $zone) {
                                                        echo '<option value="'.$zone['zoneID'].'">'.$zone['zoneID'].'</option>';
                                                    }
                                                }
                                        echo'</select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelect1">Other Zone # if Zone # = 5</label>
                                                <select class="form-control" name="secondZoneID">
                                                    <option selected value="'.$hardToReach['zoneID'].'">'.$hardToReach['zoneID'].'</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelect1">Data Zone #</label>
                                                <select class="form-control" name="dataZoneID">
                                                    <option selected value="'.$country['dataZoneID'].'">'.$country['dataZoneID'].'</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4 : Have no data bucket</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputText">English</label>
                                                <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter English Name" name="engName" value="'.$country['engName'].'">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputText">Arabic Name</label>
                                                <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Arabic Name" name="arabName" value="'.$country['arabName'].'">
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