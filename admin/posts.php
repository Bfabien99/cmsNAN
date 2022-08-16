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
                        Posts
                    </h1>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $query = "SELECT * FROM posts";
                                $get_all_posts = mysqli_query($connection,$query);

                                $count = mysqli_num_rows($get_all_posts);

                                if($count == 0){
                                    echo "<h3 class='alert-secondary'>No post found</h3>";
                                }else{
                                    while($row = mysqli_fetch_assoc($get_all_posts)){
                            ?>
                            <tr>
                                <td><?= $row['post_id'] ?></td>
                                <td><?= $row['post_author'] ?></td>
                                <td><?= $row['post_title'] ?></td>
                                <td><?= $row['post_category_id'] ?></td>
                                <td><?= $row['post_status'] ?></td>
                                <td><img src="../images/<?= $row['post_image'] ?>" width="50px"></td>
                                <td><?= $row['post_tags'] ?></td>
                                <td><?= $row['post_comment_count'] ?></td>
                                <td><?= $row['post_date'] ?></td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include('includes/footer.php'); ?>