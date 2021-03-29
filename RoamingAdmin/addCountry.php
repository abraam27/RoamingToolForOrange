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
                <p class="header"><a class="link" href="countries.php">Countries</a> / Add Country</P>
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
                            if(isset($_POST['add'])){
                                $zoneID = $_POST['zoneID'];
                                $engName = $_POST['engName'];
                                $arabName = $_POST['arabName'];
                                $dataZoneID = $_POST['dataZoneID'];
                                $secondZoneID = $_POST['secondZoneID'];
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
                                    $country = new Country($engName, $arabName, $dataZoneID, $zoneID);
                                    $countryID = $country->add();
                                    if($countryID){
                                        if($zoneID == 5){
                                            $hardToReach = new Hardtoreach($secondZoneID, $countryID);
                                            if($hardToReach->add()){
                                                echo '<div class="green">
                                                    <p>The Country has been added Successfully !</p>
                                                </div>';
                                            }else{
                                                echo '<div class="red">
                                                    <p>The Country is not added, Please try again !</p>
                                                </div>';
                                            }
                                        }else{
                                            echo '<div class="green">
                                                    <p>The Country has been added Successfully !</p>
                                                </div>';
                                        }
                                    }else{
                                        echo '<div class="red">
                                                <p>The Country is not added, Please try again !</p>
                                            </div>';
                                    }
                                }
                                
                            }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" accept-charset="utf-8">
                            <div class="form-group">
                                <label for="exampleSelect1">Zone #</label>
                                <select class="form-control" name="zoneID">
                                    <option selected>choose Zone #</option>
                                    <?php
                                        $zones = Zone::readAll();
                                        if(is_array($zones) && count($zones)>0){
                                            foreach ($zones as $zone) {
                                                echo '<option value="'.$zone['zoneID'].'">'.$zone['zoneID'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Other Zone # if Zone # = '5'</label>
                                <select class="form-control" name="secondZoneID">
                                    <option selected>choose Second Zone #</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Data Zone #</label>
                                <select class="form-control" name="dataZoneID">
                                    <option selected>choose Data Zone #</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4 : Have no data bucket</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText">English Name</label>
                                <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter English Name" name="engName">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText">Arabic Name</label>
                                <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Arabic Name" name="arabName">
                            </div>
                            <button type="submit" class="btn btn-secondary btn-lg btn-block" name="add" value="add">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once 'APP/template/footer.tpl';
?>