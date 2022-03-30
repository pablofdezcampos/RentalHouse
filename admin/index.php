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

//Adding templates
require '../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Admin</h1>
    <!-- intval to convert to int -->
    <?php if (intval($result) === 1) : ?>
        <p class="alert success">Correctly advert creation</p>
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
                        <a href="#" class="button-red-block">Eliminate</a>
                        <a href="#" class="button-yellow-block">Update</a>
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