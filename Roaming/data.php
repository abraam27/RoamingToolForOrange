<?php
require_once 'config.php';
require_once 'APP/model/zone.php';
require_once 'APP/model/country.php';
require_once 'APP/model/package.php';
require_once 'APP/model/script.php';
require_once 'APP/model/sr.php';
function retreiveData($countryID)
{
    $country = Country::readById($countryID);
    $zone = Zone::readById($country['zoneID']);
    $scripts = Script::retrieveScriptsByFlag(0);
    $srs = SR::retrieveSRsByFlag(0);
    echo '<div class="headers">
                Pricing
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="pricing" >Zone #</th>
                        <th class="pricing">Local Min</th>
                        <th class="pricing">International Min</th>
                        <th class="pricing">Back Home Min</th>
                        <th class="pricing">SMS</th>
                        <th class="pricing">Receiving Min</th>
                        <th class="pricing">Data MB</th>
                        <th class="pricing">Video Call Min</th>
                        <th class="pricing">Video Call Receiving Min</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pricing" width="75px">'.$zone['zoneID'].'</td>
                        <td class="pricing" width="90px">EGP '.$zone['localMin'].'</td>
                        <td class="pricing">EGP '.$zone['internationalMin'].'</td>
                        <td class="pricing">EGP '.$zone['backHomeMin'].'</td>
                        <td class="pricing">EGP '.$zone['sms'].'</td>
                        <td class="pricing" width="90px">EGP '.$zone['RecMin'].'</td>
                        <td class="pricing" width="90px">EGP '.$zone['dataMB'].'</td>
                        <td class="pricing">EGP '.$zone['videoCallMin'].'</td>
                        <td class="pricing" width="150px">EGP '.$zone['videoCallRecMin'].'</td>
                    </tr>
                </tbody>
            </table>
            <div class="headers">
                Scripts
            </div>
            <table class="table">
                <tbody>';
                    if(is_array($scripts) && count($scripts)>0){
                            foreach ($scripts as $script) {
                                echo '<tr>
                                        <th class="script">'.$script['head'].'</th>
                                    </tr>
                                    <tr>
                                        <td class="script">'.nl2br($script['script']).'</td>
                                    </tr>';
                            }
                        }
        echo '</tbody>
            </table>
            <div class="headers">
                SRs
            </div>
            <table class="table form-container">
                <tbody>';
                    if(is_array($srs) && count($srs)>0){
                            foreach ($srs as $sr) {
                                echo '<tr>
                                        <th class="sr">Short Code</th>
                                        <th\d class="sr">'.$sr['shortCode'].'</td>
                                    </tr>
                                    <tr>
                                        <th class="sr">Type</th>
                                        <th\d class="sr">'.$sr['type'].'</td>
                                    </tr>
                                    <tr>
                                        <th class="sr">Area</th>
                                        <th\d class="sr">'.$sr['area'].'</td>
                                    </tr>
                                    <tr>
                                        <th class="sr">Subarea</th>
                                        <th\d class="sr">'.$sr['subArea'].'</td>
                                    </tr>
                                    <tr>
                                        <th class="sr">Product</th>
                                        <th\d class="sr">'.$sr['product'].'</td>
                                    </tr>';
                            }
                        }
        echo '</tbody>
            </table>';
        $_SESSION['countryID'] = $country['countryID'];
}

if(isset($_GET['countryID'])){
    retreiveData($_GET['countryID']);
}
?>
