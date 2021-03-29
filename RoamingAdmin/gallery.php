<?php
    //require_once 'AdminSession.php';
    require_once 'APP/template/head.tpl';
    require_once 'APP/model/gallery.php';
?>

    <div id="navbar">
        <div class="container">
            <div class="left-container">
                <img src="APP/images/Orange.png"/>
            </div>
            <div class="right-container">
                <p class="header">SRs / <a href="addGallery.php">Add Gallery</a></P>
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
                            if(isset($_GET['galleryID'])){
                                if(Gallery::deleteImageByImageID($galleryID)){
                                    echo '<div class="green">
                                            <p>The Image has been Deleted Successfully !</p>
                                        </div>';
                                }else{
                                    echo '<div class="red">
                                            <p>The Image is not Deleted, Please try Again !</p>
                                        </div>';
                                }
                            }
                        ?>
                        <thead class="thead-dark">
                                <tr>
                                    <th class="pricing">Image</th>
                                    <th class="pricing">Flag</th>
                                    <th class="pricing">Edit</th>
                                    <th class="pricing">Delete</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $images = Gallery::retreiveALLImages();
                                if(is_array($images) && count($images)>0){
                                    foreach ($images as $image) {
                                        echo '<tr>
                                            <td class="pricing"><img src="upload/'.$images['imageName'].' width="600px" height="400px"/></td>
                                            <td class="pricing">'.$images['flag'].'</td>
                                            <td class="pricing"><a class="link" href="editGallery.php?galleryID='.$images['galleryID'].'">Edit</a></td>
                                            <td class="pricing"><a class="link" href="gallery.php?galleryID='.$images['galleryID'].'">Delete</a></td>
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