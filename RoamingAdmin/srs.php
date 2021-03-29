<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/sr.php';
?>

    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header">SRs / <a href="addSR.php">Add SR</a></P>
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
                    <table class="table">
                        <?php
                            if(isset($_GET['srID'])){
                                if(SR::delete($_GET['srID'])){
                                    echo '<div class="green">
                                            <p>The SR has been Deleted Successfully !</p>
                                        </div>';
                                }else{
                                    echo '<div class="red">
                                            <p>The SR is not Deleted, Please try Again !</p>
                                        </div>';
                                }
                            }
                        ?>
                        <thead class="thead-dark">
                                <tr>
                                    <th class="pricing">Short Code</th>
                                    <th class="pricing">Type</th>
                                    <th class="pricing">Area</th>
                                    <th class="pricing">Subarea</th>
                                    <th class="pricing">Product</th>
                                    <th class="pricing">Flag</th>
                                    <th class="pricing">Edit</th>
                                    <th class="pricing">Delete</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $srs = SR::retrieveSRsOrderByFlag();
                                if(is_array($srs) && count($srs)>0){
                                    foreach ($srs as $sr) {
                                        echo '<tr>
                                            <td class="pricing">'.$sr['shortCode'].'</td>
                                            <td class="pricing">'.$sr['type'].'</td>
                                            <td class="pricing">'.$sr['area'].'</td>
                                            <td class="pricing">'.$sr['subarea'].'</td>
                                            <td class="pricing">'.$sr['product'].'</td>
                                            <td class="pricing">'.$sr['flag'].'</td>
                                            <td class="pricing"><a class="link" href="editSR.php?srID='.$sr['srID'].'">Edit</a></td>
                                            <td class="pricing"><a class="link" href="srs.php?srID='.$sr['srID'].'">Delete</a></td>
                                        </tr>';
                                    }
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once 'APP/template/footer.tpl';
?>