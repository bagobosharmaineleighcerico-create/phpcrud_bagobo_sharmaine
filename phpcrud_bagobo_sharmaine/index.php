<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include("database.php");

$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Records</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Employee Records</h2>

    <!-- ADD BUTTON -->
    <button
        type="button"
        class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#add">

        Add Employee

    </button>


    <!-- TABLE -->
    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td>
                    <?php echo $row['Employee_id']; ?>
                </td>

                <td>
                    <?php echo $row['lastname']; ?>
                </td>

                <td>
                    <?php echo $row['firstname']; ?>
                </td>

                <td>

                    <!-- EDIT -->
                    <button
                        type="button"
                        class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit<?php echo $row['Employee_id']; ?>">

                        Edit

                    </button>


                    <!-- DELETE -->
                    <a
                        href="delete.php?id=<?php echo $row['Employee_id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this employee?');">

                        Delete

                    </a>


                    <!-- EDIT MODAL -->
                    <div
                        class="modal fade"
                        id="edit<?php echo $row['Employee_id']; ?>"
                        tabindex="-1">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form action="update.php" method="POST">

                                    <div class="modal-header">

                                        <h5 class="modal-title">
                                            Edit Employee
                                        </h5>

                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal">
                                        </button>

                                    </div>


                                    <div class="modal-body">

                                        <input
                                            type="hidden"
                                            name="Employee_id"
                                            value="<?php echo $row['Employee_id']; ?>">


                                        <div class="mb-3">

                                            <label class="form-label">
                                                Lastname
                                            </label>

                                            <input
                                                type="text"
                                                name="lastname"
                                                class="form-control"
                                                value="<?php echo $row['lastname']; ?>"
                                                required>

                                        </div>


                                        <div class="mb-3">

                                            <label class="form-label">
                                                Firstname
                                            </label>

                                            <input
                                                type="text"
                                                name="firstname"
                                                class="form-control"
                                                value="<?php echo $row['firstname']; ?>"
                                                required>

                                        </div>

                                    </div>


                                    <div class="modal-footer">

                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">

                                            Close

                                        </button>

                                        <button
                                            type="submit"
                                            class="btn btn-primary">

                                            Update

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>


<!-- ADD MODAL -->

<div
    class="modal fade"
    id="add"
    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="insert.php" method="POST">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Employee
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            Lastname
                        </label>

                        <input
                            type="text"
                            name="lastname"
                            class="form-control"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Firstname
                        </label>

                        <input
                            type="text"
                            name="firstname"
                            class="form-control"
                            required>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Close

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Save

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>