<?php
    require_once 'config.php';
    require_once 'APP/model/country.php';
    require_once 'APP/model/package.php';
    require_once 'APP/model/script.php';
    require_once 'APP/model/sr.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Roaming</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Roaming">
        <meta name="author" content="Abraam Emad">
        <link rel="shortcut icon" href="APP/images/Orange.png" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The styles -->
        <link rel="stylesheet" href="APP/css/bootstrap.min.css" />
        <link href="APP/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="APP/css/base.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div class="container">
                    <p>Welcome to Roaming Tool.</p>
                </div>
            </div>
            <div id="navbar">
                <div class="container">
                    <div class="left-container">
                        <img src="APP/images/Orange.png"/>
                    </div>
                    <div class="right-container">
                        <div class="styled-select">
                            <select id="country">
                                <?php
                                    $country = Country::readById($_SESSION['countryID']);
                                    echo '<option selected disabled value="'.$country['countryID'].'">'.$country['engName'].' <span> - '.$country['arabName'].'</span></option>';
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="container">
                    <div class="left-container">
                        <div class="vertical-menu">
                            <a href="index.php">Pricing</a>
                            <a href="packagesPrice.php">Packages</a>
                            <a href="checkEligibility.php">Check Eligibility</a>
                            <a href="discountMinuteRate.php">Discount Minute Rate</a>
                            <a href="antiBillShock.php">Anti-Bill Shock</a>
                        </div>
                    </div>
                    <div class="right-container">
                        <div class="well" id="data">
                            <div class="headers">
                                    Packages
                            </div>
                            <table class="table">
                                <thead class="thead-dark" style="font-size:16px">
                                    <tr>
                                        <th colspan="2">Daily</th>
                                        <th colspan="2">Weekly</th>
                                        <th colspan="2">Monthly</th>
                                        <th colspan="2" width="200px">After package rate inside Country</th>
                                    </tr>
                                    <tr>
                                        <th class="package">Fees</th>
                                        <th class="package">Volume</th>
                                        <th class="package">Fees</th>
                                        <th class="package">Volume</th>
                                        <th class="package">Fees</th>
                                        <th class="package">Volume</th>
                                        <th class="package">Fees</th>
                                        <th class="package">Volume</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                            $packages = Package::retrievePackagesByDataZoneID($country['dataZoneID']);
                                            if(is_array($packages) && count($packages)>0){
                                                foreach ($packages as $package) {
                                                    echo '<td class="package">EGP '.$package['fees'].'</td>';
                                                    if($package['volume'] >= 1000){
                                                        echo '<td class="package">'.($package['volume']/1000).' GB</td>';
                                                    }else{
                                                        echo '<td class="package">'.$package['volume'].' MB</td>';
                                                    }

                                                }
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="headers">
                                Scripts
                            </div>
                            <table class="table">
                                <tbody>
                                    <?php
                                        $scripts = Script::retrieveScriptsByFlag(1);
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
                                    ?>
                                </tbody>
                            </table>
                            <div class="headers">
                                SRs
                            </div>
                            <table class="table form-container">
                                <tbody>
                                    <?php
                                        $srs = SR::retrieveSRsByFlag(1);
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
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                <div class="container footerCR">
                    <p>Abraam Emad &copy; 2019</p>
                </div>
            </div>
        </div>
        <script src="APP/js/jquery.min.js"></script>
        <script src="APP/js/jquery-3.2.1.min.js"></script>
        <script src="APP/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="APP/js/plugins.js"></script>
    </body>
</html>