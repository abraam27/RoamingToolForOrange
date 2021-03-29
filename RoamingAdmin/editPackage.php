<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/zone.php';
    require_once 'APP/model/package.php';
?>
    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header"><a class="link" href="packages.php">Packages</a> / Edit Package</P>
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
                                    $packageID = $_POST['packageID'];
                                    $packageName = $_POST['packageName'];
                                    $fees = $_POST['fees'];
                                    $volume = $_POST['volume'];
                                    $dataZoneID = $_POST['dataZoneID'];
                                    if($dataZoneID == NULL){
                                        echo '<div class="red">
                                            <p>Please Enter Data Zone ID, And try again !</p>
                                        </div>';
                                    }elseif($packageName == NULL){
                                        echo '<div class="red">
                                            <p>Please Enter Package Name, And try again !</p>
                                        </div>';
                                    }elseif(!is_numeric($fees)){
                                        echo '<div class="red">
                                            <p>Fees must be a Numeric Value, Please try again !</p>
                                        </div>';
                                    }elseif(!is_numeric($volume)){
                                        echo '<div class="red">
                                            <p>Volume must be a Numeric Value, Please try again !</p>
                                        </div>';
                                    }else{
                                        $package = new Package($packageName, $fees, $volume, $dataZoneID, $packageID);
                                        if($package->update($packageID)){
                                            header("location: editPackage.php?packageID=".$packageID."&flag=1");
                                            exit();
                                        }else{
                                            header("location: editPackage.php?packageID=".$packageID."&flag=0");
                                            exit();
                                        }
                                    }
                                    
                                }
                                if(isset($_GET['flag'])){
                                    if($_GET['flag'] == 1){
                                        echo '<div class="green">
                                            <p>The Package has been updated Successfully !</p>
                                        </div>';
                                    }else{
                                        echo '<div class="red">
                                            <p>The Package is not updated, Please try again !</p>
                                        </div>';
                                    }
                                }
                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" accept-charset="utf-8">
                                <?php
                                    if(isset($_GET['packageID'])){
                                        $package = Package::readById($_GET['packageID']);
                                        echo '<input type="hidden" name="packageID" value="'.$_GET['packageID'].'" />
                                        <div class="form-group">
                                            <label for="exampleSelect1">Data Zone #</label>
                                            <select class="form-control" name="dataZoneID">
                                                <option selected>'.$package['dataZoneID'].'</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>';
                                        echo'</select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1">Package Name</label>
                                            <select class="form-control" name="packageName">
                                                <option selected="">'.$package['packageName'].'</option>
                                                <option value="Daily">Daily</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="After package rate inside Country">After package rate inside Country</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText">Fees</label>
                                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Fees" name="fees" value="'.$package['fees'].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText">Volume / MB</label>
                                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Volume" name="volume" value="'.$package['volume'].'">
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