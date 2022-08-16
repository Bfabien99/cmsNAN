<?php include('includes/header.php'); ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include('includes/navigation.php'); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Categories
                    </h1>

                    <div class="col-xs-6">

                        <?php
                        if (isset($_POST['submit'])) {
                            $cat_title = mysqli_escape_string($connection, $_POST['cat_title']);
                            if ($cat_title == "" || empty($cat_title)) {
                                echo "<h3 class='alert alert-danger'>The field should not be empty!</h3>";
                            } else {
                                $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
                                $insert = mysqli_query($connection, $query);

                                if (!$insert) {
                                    echo "<h2 class='alert alert-warning'> QUERY EXCECUTION FAILED!</h2>";
                                } else {
                                    echo "<h2 class='alert alert-success'>New category added!</h2>";
                                }
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title" id="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM categories";
                                $select_all_categories_query = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    echo "<tr>
                                                <td>{$row['cat_id']}</td>
                                                <td>{$row['cat_title']}</td>
                                            </tr>
                                        ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include('includes/footer.php'); ?>