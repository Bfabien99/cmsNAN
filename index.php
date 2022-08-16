<?php include("includes/db.php");?>
<?php include("includes/header.php");?>

<!-- Navigation -->
<?php include("includes/navigation.php");?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php
                $query = "SELECT * FROM posts";
                $select_all_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts)) 
                {
            ?>

            <h2>
                <a href="#"><?= $row["post_title"] ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?= $row["post_author"] ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?= $row["post_date"] ?></p>
            <hr>
            <img class="img-responsive" src="images/<?= $row['post_image']?>" alt="<?= $row['post_image'] ?>">
            <hr>
            <p><?= $row["post_content"] ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            <?php }?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include("includes/sidebar.php");?>
        

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include("includes/footer.php");?>