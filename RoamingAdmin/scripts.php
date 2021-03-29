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
                <p class="header">Scripts / <a href="addScript.php">Add Script</a></P>
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
                            if(isset($_GET['scriptID'])){
                                if(Script::delete($_GET['scriptID'])){
                                    echo '<div class="green">
                                            <p>The Script has been Deleted Successfully !</p>
                                        </div>';
                                }else{
                                    echo '<div class="red">
                                            <p>The Script is not Deleted, Please try Again !</p>
                                        </div>';
                                }
                            }
                        ?>
                        <thead class="thead-dark">
                                <tr>
                                    <th class="pricing">Head of Script</th>
                                    <th class="pricing" width="500px">Script</th>
                                    <th class="pricing">Flag</th>
                                    <th class="pricing">Edit</th>
                                    <th class="pricing">Delete</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $scripts = Script::retrieveScriptsOrderByFlag();
                                if(is_array($scripts) && count($scripts)>0){
                                    foreach ($scripts as $script) {
                                        echo '<tr>
                                            <td class="script">'.nl2br($script['head']).'</td>
                                            <td class="script">'.nl2br($script['script']).'</td>
                                            <td class="script">'.$script['flag'].'</td>
                                            <td class="script"><a class="link" href="scripts.php?scriptID='.$script['scriptID'].'">Delete</a></td>
                                            <td class="script"><a class="link" href="editScript.php?scriptID='.$script['scriptID'].'">Edit</a></td>
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