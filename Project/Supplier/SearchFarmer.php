<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Farmer</title>
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --> -->
</head>
<body>

<div class="container mt-5">
    <!-- Search Form -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h4>Search Farmer</h4>
                </div>
                <div class="card-body">
                    <form id="form1" name="form1" method="post" action="">
                        <div class="mb-3">
                            <label for="sel_district" class="form-label">District</label>
                            <select name="sel_district" id="sel_district" class="form-select" onchange="getPlace(this.value)">
                                <option value="">--- Select District ---</option>
                                <?php 
                                $selQry = "select * from tbl_district";
                                $res = $Con->query($selQry);
                                while ($row = $res->fetch_assoc()) {
                                    echo '<option value="'.$row["district_id"].'">'.$row["district_name"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sel_place" class="form-label">Place</label>
                            <select name="sel_place" id="sel_place" class="form-select">
                                <option value="">--- Select Place ---</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="btn_search" id="btn_search" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Farmer List -->
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="text-center">Farmer List</h4>
            <?php 
            if (isset($_POST["btn_search"])) {
                $place = $_POST["sel_place"];
                $selQry = "select * from tbl_farmer where place_id='" . $place . "'";
                $res = $Con->query($selQry);

                if ($res->num_rows > 0) {
                    $i = 0;
                    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
                    while ($row = $res->fetch_assoc()) {
                        $i++;
            ?>
                        <div class="col">
                            <div class="card h-100 text-center shadow-sm">
                                <img src="../Assets/Files/UserDocs/<?php echo $row["farmer_photo"]; ?>" class="card-img-top" alt="Farmer Photo" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["farmer_name"]; ?></h5>
                                    <p class="card-text">
                                        <strong>Contact:</strong> <?php echo $row["farmer_contact"]; ?><br>
                                        <strong>Address:</strong> <?php echo $row["farmer_address"]; ?><br>
                                        <strong>Email:</strong> <?php echo $row["farmer_email"]; ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="SearchProduct.php?id=<?php echo $row["farmer_id"]; ?>" class="btn btn-primary btn-sm">View Products</a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                    echo '</div>'; // End row
                } else {
                    echo "<h5 class='text-center text-danger'>No Data Found</h5>";
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function getPlace(did) {
    $.ajax({
        url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
        success: function (result) {
            $("#sel_place").html(result);
        }
    });
}
</script>

<?php
include("Foot.php");
ob_flush();
?>
</body>
</html>
