<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/SR.php';
?>

    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header"><a class="link" href="srs.php">SRs</a> / Edit SR</P>
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
                                $srID = $_POST['srID'];
                                $shortCode = $_POST['shortCode'];
                                $type = $_POST['type'];
                                $area = $_POST['area'];
                                $subarea = $_POST['subarea'];
                                $product = $_POST['product'];
                                $flag = $_POST['flag'];
                                if($shortCode == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Short Code, And try again !</p>
                                        </div>';
                                }elseif(!is_numeric($shortCode)){
                                    echo '<div class="red">
                                            <p>Short Code must be a Numeric Value, Please try again !</p>
                                        </div>';
                                }elseif($type == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter the Type, And try again !</p>
                                        </div>';
                                }elseif($area == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter the Area, And try again !</p>
                                        </div>';
                                }elseif($subarea == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter the Subarea, And try again !</p>
                                        </div>';
                                }elseif($product == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter the Product, And try again !</p>
                                        </div>';
                                }elseif($flag == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter the flag of SR, And try again !</p>
                                        </div>';
                                }else{
                                    $sr = new SR($shortCode, $type, $area, $subarea, $product, $flag, $srID);
                                    if($sr->update($srID)){
                                        header("location: editSR.php?srID=".$srID."&flag=1");
                                        exit();
                                    }else{
                                        header("location: editSR.php?srID=".$srID."&flag=0");
                                        exit();
                                    }
                                }
                            }
                            if(isset($_GET['flag'])){
                                if($_GET['flag'] == 1){
                                    echo '<div class="green">
                                        <p>The SR has been updated Successfully !</p>
                                    </div>';
                                }else{
                                    echo '<div class="red">
                                        <p>The SR is not updated, Please try again !</p>
                                    </div>';
                                }
                            }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" accept-charset="utf-8">
                            <?php
                                if(isset($_GET['srID'])){
                                    $sr = SR::readById($_GET['srID']);
                                    echo '<input type="hidden" name="srID" value="'.$_GET['srID'].'" />
                                        <div class="form-group">
                                            <label for="exampleInputText">Short Code</label>
                                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Short Code" name="shortCode" value="'.$sr['shortCode'].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText">Type</label>
                                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Type" name="type" value="'.$sr['type'].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText">Area</label>
                                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Area" name="area" value="'.$sr['area'].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText">Subarea</label>
                                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Subarea" name="subarea" value="'.$sr['subarea'].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText">Product</label>
                                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Product" name="product" value="'.$sr['product'].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1">SR Flag</label>
                                            <select class="form-control" name="flag">
                                                <option selected value="'.$sr['flag'].'">The Selected Option : '.$sr['flag'].'</option>
                                                <option value="0">0 : Pricing Part</option>
                                                <option value="1">1 : Package Part</option>
                                                <option value="2">2 : Check Eligibility Part</option>
                                                <option value="3">3 : Discount Minute Rate Part</option>
                                                <option value="4">4 : Anti-Bill Shock Part</option>
                                            </select>
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