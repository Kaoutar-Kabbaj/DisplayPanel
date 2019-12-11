<?php
// Include config file
session_start();
include 'connection/db_connection_file.php';
$conn = OpenCon();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION["user"]=  $id;

    $update = true;
    $record = mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $nom = $n['nom'];
        $address = $n['adresse'];
        $email = $n['email'];
        $solutions = $n['solutions'];
        $num_tel = $n['num_tel'];
        $logo_user = $n['logo_user'];
    }
}

?>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">


<div class="wrapper" style="overflow: paged-x">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <form action="upload_client.php" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom; ?>">
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <textarea id="address" name="address" class="form-control"><?php echo $address; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="email"  name="email" class="form-control" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label>Solutions</label>
                            <select name="myselectbox" id="myselectbox" class="custom-select mb-3">
                                <option value="myoption1" <?php if($solutions =="myoption1") echo 'selected="selected"'; ?>>Solution 1</option>
                                <option value="myoption2" <?php if($solutions =="myoption2") echo 'selected="selected"'; ?>>Solution 2</option>
                                <option value="myoption3" <?php if($solutions =="myoption3") echo 'selected="selected"'; ?>>Solution 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Numero telephone</label>
                            <input type="text" id="phone"  name="phone" class="form-control" value="<?php echo $num_tel; ?>">
                        </div>
                        <label>Logo</label>
                            <div class="custom-file">
                               <input type="file" name="avatar"  class="custom-file-input" id="customFileLang" lang="fr">
                                <label class="custom-file-label" id="customFile"> <?=$logo_user?></label>
                            </div>


                        <input type="hidden" id="id_user" value="<?php echo $id; ?>"/>
                        <center>
                            <br><br>
                            <input type="submit" class="btn btn-primary" value="Modifier" id="update_btn">
                            <a href="manage_customers.php" class="btn btn-default">Annuler</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var fileName = document.getElementById("customFileLang");

            var fileNama = fileName.value.split(/(\\|\/)/g).pop();
            $('.custom-file-input').on('change',function(){
                var fileName = document.getElementById("customFileLang");
                var fileNama = fileName.value.split(/(\\|\/)/g).pop();
                // var fileSize = document.getElementById('customFileLang').files[0].size;

                document.getElementById("customFile").innerHTML = fileNama ;

            })

        })
    </script>
</div>
</body>

</html>