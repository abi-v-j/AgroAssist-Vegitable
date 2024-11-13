<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_POST['btn_send'])) {
    $title = $_POST['txt_title'];
    $description = $_POST['txt_description'];
    
    // Inserting the complaint details into the database
    $insQry = "INSERT INTO tbl_complaint (complaint_title, complaint_content, supplier_id, complaint_date) 
               VALUES ('$title', '$description', '" . $_SESSION['sid'] . "', CURDATE())";
    
    if ($Con->query($insQry)) {
        echo "<script>alert('Complaint Submitted Successfully');</script>";
    } else {
        echo "<script>alert('Failed to Submit Complaint');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Submit Your Complaint</h1>

    <!-- Complaint Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="txt_title" class="form-label">Complaint Title</label>
                            <input type="text" class="form-control" id="txt_title" name="txt_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="txt_description" class="form-label">Description</label>
                            <textarea class="form-control" id="txt_description" name="txt_description" rows="5" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" name="btn_send">Send Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Complaints List -->
    <h2 class="text-center mt-5">Your Complaints</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $selQry = "SELECT * FROM tbl_complaint WHERE supplier_id='" . $_SESSION['sid'] . "'";
            $result = $Con->query($selQry);
            while ($data = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['complaint_title']; ?></td>
                    <td><?php echo $data['complaint_content']; ?></td>
                    <td><?php echo $data['complaint_date']; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
