<?php 
    if (!empty($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = $id";
        $edit_categorie_query = mysqli_query($connection, $query);

        if (!$edit_categorie_query) {
            die("QUERY EXCECUTION FAILED!" . mysqli_error($connection));
        } else {
            $cat = mysqli_fetch_assoc($edit_categorie_query);
    ?>
            <div class="form-group">
                <label for="cat_title">Edit Category</label>
                <input class="form-control" type="text" name="cat_title" id="cat_title" value="<?php if (isset($cat)) echo $cat['cat_title']; ?> ">

            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
            </div>
    <?php }
    } ?>

    <?php
        if (isset($_POST['update']) && !empty($_GET['edit'])) {
            $id = $_GET['edit'];
            $title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '$title' WHERE cat_id = $id";
            $delete_categorie_query = mysqli_query($connection, $query);

            if (!$delete_categorie_query) {
                die("QUERY EXCECUTION FAILED!" . mysqli_error($connection));
            } else {
                header("Location: categories.php");
            }
        }
        ?>