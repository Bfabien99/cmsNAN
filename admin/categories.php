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
                            insert_category();
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
                        <hr>
                        <form action="" method="POST">

                            <?php
                                if(isset($_GET['edit'])){
                                    include('includes/update_category.php');
                                }
                                ?>
                        </form>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    findAllCategories();
                                ?>

                                <?php
                                    deleteCategory();
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