<?php
    require_once 'config.php';
    require_once 'APP/model/script.php';
    require_once 'APP/model/sr.php';
    require_once 'APP/model/gallery.php';
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
                                Link
                            </div>
                            <table class="table">
                                <tbody>
                                    <td class="script" style="text-align: center"><a class="link pricing" href="#">Link of check eligibility</a></td>
                                </tbody>
                            </table>
                            <div class="headers">
                                Gallery
                            </div>
                            <table class="table">
                                <tbody>
                                    <?php
                                        $images = Gallery::retreiveAllImagesByFlag(3);
                                        if(is_array($images) && count($images)>0){
                                            foreach ($images as $imageName) {
                                                echo '<td><img src="APP/upload/'.$imageName.'" height="900px" width="500px"/></td>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="headers">
                                Scripts
                            </div>
                            <table class="table">
                                <tbody>
                                    <?php
                                        $scripts = Script::retrieveScriptsByFlag(3);
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
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="pricing">Short Code</th>
                                        <th class="pricing">Type</th>
                                        <th class="pricing">Area</th>
                                        <th class="pricing">Subarea</th>
                                        <th class="pricing">Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $srs = SR::retrieveSRsByFlag(3);
                                        if(is_array($srs) && count($srs)>0){
                                            foreach ($srs as $sr) {
                                                echo '<tr>
                                                        <td class="script">'.$sr['shortCode'].'</td>
                                                        <td class="script">'.$sr['type'].'</td>
                                                        <td class="script">'.$sr['area'].'</td>
                                                        <td class="script">'.$sr['subarea'].'</td>
                                                        <td class="script">'.$sr['product'].'</td>
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