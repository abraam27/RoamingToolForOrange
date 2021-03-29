<?php
    require_once 'config.php';
    require_once 'APP/model/country.php';
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
                                <option id="default">Search for Country</option>
                                <optgroup label="Zone 1">
                                    <?php
                                        $countries = Country::retrieveCountriesOrderByEngName();
                                        if(is_array($countries) && count($countries)>0){
                                            foreach ($countries as $country) {
                                                if($country['zoneID'] == 1){
                                                    echo '<option value="'.$country['zoneID'].'">'.$country['engName'].' <span> - '.$country['arabName'].'</span></option>';
                                                }
                                            }
                                        }
                                    ?>
                                </optgroup>
                                <optgroup label="Zone 2">
                                    <?php
                                        $countries = Country::retrieveCountriesOrderByEngName();
                                        if(is_array($countries) && count($countries)>0){
                                            foreach ($countries as $country) {
                                                if($country['zoneID'] == 2){
                                                    echo '<option value="'.$country['zoneID'].'">'.$country['engName'].' <span> - '.$country['arabName'].'</span></option>';
                                                }
                                            }
                                        }
                                    ?>
                                </optgroup>
                                <optgroup label="Zone 3">
                                    <?php
                                        $countries = Country::retrieveCountriesOrderByEngName();
                                        if(is_array($countries) && count($countries)>0){
                                            foreach ($countries as $country) {
                                                if($country['zoneID'] == 3){
                                                    echo '<option value="'.$country['zoneID'].'">'.$country['engName'].' <span> - '.$country['arabName'].'</span></option>';
                                                }
                                            }
                                        }
                                    ?>
                                </optgroup>
                                <optgroup label="Zone 4">
                                    <?php
                                        $countries = Country::retrieveCountriesOrderByEngName();
                                        if(is_array($countries) && count($countries)>0){
                                            foreach ($countries as $country) {
                                                if($country['zoneID'] == 4){
                                                    echo '<option value="'.$country['zoneID'].'">'.$country['engName'].' <span> - '.$country['arabName'].'</span></option>';
                                                }
                                            }
                                        }
                                    ?>
                                </optgroup>
                                <optgroup label="Zone 5">
                                    <?php
                                        $countries = Country::retrieveCountriesOrderByEngName();
                                        if(is_array($countries) && count($countries)>0){
                                            foreach ($countries as $country) {
                                                if($country['zoneID'] == 5){
                                                    echo '<option value="'.$country['zoneID'].'">'.$country['engName'].' <span> - '.$country['arabName'].'</span></option>';
                                                }
                                            }
                                        }
                                    ?>
                                </optgroup>
                                <option value="999">Other Country</option>
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
                            <?php require_once 'data.php';?>
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