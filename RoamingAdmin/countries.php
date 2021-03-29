<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/country.php';
    require_once 'APP/model/zone.php';
?>

    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header">Countries / <a href="addCountry.php">Add Country</a></P>
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
                            if(isset($_GET['countryID'])){
                                if(Country::delete($_GET['countryID'])){
                                    echo '<div class="green">
                                            <p>The Country has been Deleted Successfully !</p>
                                        </div>';
                                }else{
                                    echo '<div class="red">
                                            <p>The Country is not Deleted, Please try Again !</p>
                                        </div>';
                                }
                            }
                        ?>
                        <thead class="thead-dark">
                            <tr>
                                <th class="pricing">Data Zone #</th>
                                <th class="pricing">English Name</th>
                                <th class="pricing">Arabic Name</th>
                                <th class="pricing">Edit</th>
                                <th class="pricing">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $zones = Zone::readAll();
                                $countries = Country::readAll();
                                if(is_array($zones) && count($zones)>0){
                                    foreach ($zones as $zone) {
                                        echo '<tr>
                                            <th class="pricing" colspan="5">Zone '.$zone['zoneID'].'</th>
                                        </tr>';
                                        if(is_array($countries) && count($countries)>0)
                                        {
                                            foreach ($countries as $country) {
                                                if($zone['zoneID'] == $country['zoneID']){
                                                    echo '<tr>
                                                            <td class="pricing">'.$country['dataZoneID'].'</td>
                                                            <td class="pricing">'.$country['engName'].'</td>
                                                            <td class="pricing">'.$country['arabName'].'</td>
                                                            <th class="pricing link"><a class="link" href="editCountry.php?countryID='.$country['countryID'].'">Edit</a></th>
                                                            <th class="pricing link"><a class="link" href="countries.php?countryID='.$country['countryID'].'">Delete</a></th>
                                                        </tr>';
                                                }
                                            }
                                        }
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