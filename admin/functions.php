<?php

function insert_category()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = mysqli_escape_string($connection, $_POST['cat_title']);
        if ($cat_title == "" || empty($cat_title)) {
            echo "<h3 class='alert alert-danger'>The field should not be empty!</h3>";
        } else {
            $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
            $insert = mysqli_query($connection, $query);

            if (!$insert) {
                die("QUERY EXCECUTION FAILED!" . mysqli_error($connection));
            } else {
                echo "<h2 class='alert alert-success'>New category added!</h2>";
            }
        }
    }
}

function deleteCategory(){
    global $connection;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = $id";
        $delete_categorie_query = mysqli_query($connection, $query);

        if (!$delete_categorie_query) {
            die("QUERY EXCECUTION FAILED!" . mysqli_error($connection));
        } else {
            header("Location: categories.php");
        }
    }
}

function findAllCategories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        echo "<tr>
                <td>{$row['cat_id']}</td>
                <td>{$row['cat_title']}</td>
                <td><a class='btn btn-danger' href='?delete={$row['cat_id']}'>Delete</a></td>
                <td><a class='btn btn-primary' href='?edit={$row['cat_id']}'>Edit</a></td>
            </tr>
        ";
    }
}
