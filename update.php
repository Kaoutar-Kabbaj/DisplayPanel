<?php
// Include config file

include 'connection/db_connection_file.php';
$conn = OpenCon();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $update = true;
        $record = mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");

        if (count($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $nom = $n['nom'];
            $address = $n['adresse'];
            $email = $n['email'];
            $solutions = $n['solutions'];
            $num_tel = $n['num_tel'];
        }
    }

?>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" id="nom" class="form-control" value="<?php echo $nom; ?>">
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <textarea id="address" class="form-control"><?php echo $address; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" id="email" class="form-control" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label>solutions</label>
                            <select name="myselectbox" id="myselectbox" class="custom-select mb-3">
                                <option value="myoption1" <?php if($solutions =="myoption1") echo 'selected="selected"'; ?>>Solution 1</option>
                                <option value="myoption2" <?php if($solutions =="myoption2") echo 'selected="selected"'; ?>>Solution 2</option>
                                <option value="myoption3" <?php if($solutions =="myoption3") echo 'selected="selected"'; ?>>Solution 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>numero telephone</label>
                            <input type="text" id="phone" class="form-control" value="<?php echo $num_tel; ?>">
                        </div>
                        <input type="hidden" id="id_user" value="<?php echo $id; ?>"/>
                        <center>
                            <input type="submit" class="btn btn-primary" value="Modifier" id="update_btn">
                        <a href="dashboard_admin.php" class="btn btn-default">Annuler</a>
                        </center>
                    </form>
                </div>
            </div>        
        </div>
    </div>
<script type="text/javascript">
    $(document).on('click', '#update_btn', function(e){
        e.preventDefault();
        var id = $('#id_user').val();
        var nom = $('#nom').val();
        var address = $('#address').val();
        var email = $('#email').val();
        var solutions = $('#myselectbox').val();
        var phone = $('#phone').val();
        $.ajax({
          url: 'update_user.php',
          type: 'POST',
          data: {
            'id': id,
            'nom': nom,
            'address': address,
            'email': email,
            'solutions': solutions,
            'phone':phone
          },
          success: function(response){
            window.location= "dashboard_admin.php";
           document.getElementById("myDIV").style.display = "block";
          }
        });     
      });
</script>