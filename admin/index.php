<?php

//Import Connection
require '../includes/config/database.php';
$db = connectDataBase();

//Write Query
$query = 'SELECT * FROM propierties';

//Consult DataBase
$resultQuery = mysqli_query($db, $query);

//Include alert of advert creation
$result = $_GET['result'] ?? null;

//Checking the REQUEST_METHOD to check we pass the id to elimate the property
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //Delete the image file
        $query = "SELECT image FROM propierties WHERE id = ${id}";

        $result = mysqli_query($db, $query);
        $property = mysqli_fetch_assoc($result);

        unlink('../img/' . $property['image']);

        //Delete field
        $query = "DELETE FROM propierties WHERE id = ${id}";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('location: /admin?result=3');
        }
    }
}

//Adding templates
require '../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Admin</h1>
    <!-- intval to convert to int -->
    <?php if (intval($result) === 1) : ?>
        <p class="alert success">Correctly Advert Creation</p>
    <?php elseif (intval($result) === 2) : ?>
        <p class="alert success">Correctly Advert Update</p>
    <?php elseif (intval($result) === 3) : ?>
        <p class="alert success">Correctly Advert Elimination</p>
    <?php endif ?>
    <a href="/admin/properties/create.php" class="button-green-inline">Create</a>

    <table class="propierties">

        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($property = mysqli_fetch_assoc($resultQuery)) : ?>
                <tr>
                    <td> <?php echo $property['id']; ?> </td>
                    <td> <?php echo $property['title']; ?> </td>
                    <td><img src="/img/<?php echo $property['image']; ?>" alt="Image" class="image-table"></td>
                    <td><?php echo $property['price']; ?></td>
                    <td>
                        <form method="POST">
                            <!-- Input not visible -->
                            <input type="hidden" name="id" value="<?php echo $property['id']; ?>">

                            <input type="submit" class="w-100 button-red-block" value="Delete">
                        </form>
                        <a href="../admin/properties/update.php?id=<?php echo $property['id'] ?>" class="button-yellow-block">Update</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</main>

<?php
//Close Connection
mysqli_close($db);
addTemplate('footer');
?>