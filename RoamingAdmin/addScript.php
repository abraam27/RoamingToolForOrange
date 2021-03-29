<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/script.php';
?>

    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header"><a class="link" href="scripts.php">Scripts</a> / Add Script</P>
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
                                $head = $_POST['head'];
                                $script = $_POST['script'];
                                $flag = $_POST['flag'];
                                if($head == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter Head of script, And try again !</p>
                                        </div>';
                                }elseif($script == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter the script, And try again !</p>
                                        </div>';
                                }elseif($flag == NULL){
                                    echo '<div class="red">
                                            <p>Please Enter the Flag of the script, And try again !</p>
                                        </div>';
                                }else{
                                    $script = new Script($head, $script, $flag);
                                    if($script->add()){
                                        echo '<div class="green">
                                                <p>The Script has been added Successfully !</p>
                                            </div>';
                                    }else{
                                        echo '<div class="red">
                                                <p>The Script is not added, Please try again !</p>
                                            </div>';
                                    }
                                }
                            }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" accept-charset="utf-8">
                            <div class="form-group">
                                <label >Head of Script</label>
                                <textarea class="form-control"  rows="3" name="head"></textarea>
                            </div>
                            <div class="form-group">
                                <label >Script</label>
                                <textarea class="form-control"  rows="8" name="script"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Script Flag</label>
                                <select class="form-control" name="flag">
                                    <option selected value="'.$sr['flag'].'">Choose Script Flag</option>
                                    <option value="0">0 : Pricing Part</option>
                                    <option value="1">1 : Package Part</option>
                                    <option value="2">2 : Check Eligibility Part</option>
                                    <option value="3">3 : Discount Minute Rate Part</option>
                                    <option value="4">4 : Anti-Bill Shock Part</option>
                                </select>
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