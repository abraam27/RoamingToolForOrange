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
                <p class="header"><a class="link" href="packages.php">Packages</a> / Add Package</P>
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
                                if(isset($_POST['add'])){
                                    $dataZoneID = $_POST['dataZoneID'];
                                    $packageName = $_POST['packageName'];
                                    $fees = $_POST['fees'];
                                    $volume = $_POST['volume'];
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
                                        $package = new Package($packageName, $fees, $volume, $dataZoneID);
                                        if($package->add()){
                                            echo '<div class="green">
                                                    <p>The Package has been added Successfully !</p>
                                                </div>';
                                        }else{
                                            echo '<div class="red">
                                                    <p>The Package is not added, Please try again !</p>
                                                </div>';
                                        }
                                    }
                                }
                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" accept-charset="utf-8">
                                <div class="form-group">
                                    <label for="exampleSelect1">Data Zone #</label>
                                    <select class="form-control" name="dataZoneID">
                                        <option selected>Choose Data Zone #</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">Package Name</label>
                                    <select class="form-control" name="packageName">
                                        <option selected="">Choose the Name </option>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="After package rate inside Country">After package rate inside Country</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Fees</label>
                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Fees" name="fees">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Volume / MB</label>
                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Volume" name="volume">
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