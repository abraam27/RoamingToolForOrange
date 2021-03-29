<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/package.php';
    require_once 'APP/model/zone.php';
?>
    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header">Packages / <a href="addPackage.php">Add Package</a></P>
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
                            if(isset($_GET['packageID'])){
                                if(Package::delete($_GET['packageID'])){
                                    echo '<div class="green">
                                            <p>The Package has been Deleted Successfully !</p>
                                        </div>';
                                }else{
                                    echo '<div class="red">
                                            <p>The Package is not Deleted, Please try Again !</p>
                                        </div>';
                                }
                            }
                        ?>
                        <thead class="thead-dark">
                                <tr>
                                    <th class="pricing">Package Name</th>
                                    <th class="pricing">Data Zone ID</th>
                                    <th class="pricing">Fees</th>
                                    <th class="pricing">Volume</th>
                                    <th class="pricing">Edit</th>
                                    <th class="pricing">Delete</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $packages = Package::retrievePackagesOrsderByDataZoneID();
                                if(is_array($packages) && count($packages)>0){
                                    foreach ($packages as $package) {
                                        echo '<tr>
                                            <td class="pricing">'.$package['packageName'].'</td>
                                            <td class="pricing">'.$package['dataZoneID'].'</td>
                                            <td class="pricing">'.$package['fees'].'</td>
                                            <td class="pricing">'.$package['volume'].'</td>
                                            <th class="pricing link"><a class="link" href="editPackage.php?packageID='.$package['packageID'].'">Edit</a></th>
                                            <th class="pricing link"><a class="link" href="packages.php?packageID='.$package['packageID'].'">Delete</a></th>
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