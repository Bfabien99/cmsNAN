<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>

<!-- Navigation -->
<?php include("includes/navigation.php"); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Search result
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php
            if (isset($_POST['submit'])) {
                $search = strip_tags($_POST['search']);

                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection, $query);

                if (!$search_query) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo "<h3 class='alert alert-danger text-center'>NO RESULT</h3>";
                } else {

                    $query = "SELECT * FROM posts";
                    $select_all_posts = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
            ?>

                        <h2>
                            <a href="#"><?= $row["post_title"] ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?= $row["post_author"] ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?= $row["post_date"] ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?= $row['post_image'] ?>" alt="<?= $row['post_image'] ?>">
                        <hr>
                        <p><?= $row["post_content"] ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
            <?php }
                }
            } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include("includes/sidebar.php"); ?>


    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>