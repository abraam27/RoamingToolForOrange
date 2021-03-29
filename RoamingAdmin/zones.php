<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/zone.php';
    require_once 'APP/model/package.php';
    require_once 'APP/model/country.php';
    require_once 'APP/model/hardtoreach.php';
?>
    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header">Zones / <a href="addZone.php">Add Zone</a></P>
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
                            if(isset($_GET['zoneID'])){
                                $zoneID = $_GET['zoneID'];
                                if($zoneID == 5){
                                    if(Hardtoreach::deleteAllData()){
                                        if(Country::deleteCountriesByZoneID($zoneID)){
                                            if(Zone::delete($zoneID)){
                                                echo '<div class="green">
                                                    <p>The Zone has been Deleted Successfully !</p>
                                                </div>';
                                            }else{
                                                echo '<div class="red">
                                                    <p>The Zone is not Deleted zone, Please try Again !</p>
                                                </div>';
                                            }
                                        }else{
                                            echo '<div class="red">
                                                <p>The Zone is not Deleted country, Please try Again !</p>
                                            </div>';
                                        }
                                    }
                                }else{
                                    if(Country::deleteCountriesByZoneID($zoneID)){
                                        if(Zone::delete($zoneID)){
                                            echo '<div class="green">
                                                <p>The Zone has been Deleted Successfully !</p>
                                            </div>';
                                        }else{
                                            echo '<div class="red">
                                                <p>The Zone is not Deleted zone, Please try Again !</p>
                                            </div>';
                                        }
                                    }else{
                                        echo '<div class="red">
                                            <p>The Zone is not Deleted country, Please try Again !</p>
                                        </div>';
                                    }
                                }
                            }
                        ?>
                        <thead class="thead-dark">
                            <tr>
                                <th class="pricing">Local Minute</th>
                                <th class="pricing">International Minute</th>
                                <th class="pricing">Back Home Minute</th>
                                <th class="pricing">Receiving Minute</th>
                                <th class="pricing">SMS</th>
                                <th class="pricing">Data MB</th>
                                <th class="pricing">Video Call Minute</th>
                                <th class="pricing">Video Call Receiving Minute</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $zones = Zone::readAll();
                                if(is_array($zones) && count($zones)>0){
                                    foreach ($zones as $zone) {
                                        echo '<tr>
                                                <th class="pricing" colspan="6">Zone '.$zone['zoneID'].'</th>
                                                <th class="pricing"><a class="link" href="editZone.php?zoneID='.$zone['zoneID'].'">Edit</a></th>
                                                <th class="pricing"><a class="link" href="zones.php?zoneID='.$zone['zoneID'].'">Delete</a></th>
                                            </tr>
                                            <tr>
                                                <td class="pricing" width="90px">EGP '.$zone['localMin'].'</td>
                                                <td class="pricing">EGP '.$zone['internationalMin'].'</td>
                                                <td class="pricing">EGP '.$zone['backHomeMin'].'</td>
                                                <td class="pricing">EGP '.$zone['RecMin'].'</td>
                                                <td class="pricing" width="90px">EGP '.$zone['sms'].'</td>
                                                <td class="pricing" width="90px">EGP '.$zone['dataMB'].'</td>
                                                <td class="pricing">EGP '.$zone['videoCallMin'].'</td>
                                                <td class="pricing" width="150px">EGP '.$zone['videoCallRecMin'].'</td>
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