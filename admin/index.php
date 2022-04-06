<?php

require '../includes/app.php';
isAuth();

use App\Propierty;
use App\Seller;

//Get all propierties
$propierties = Propierty::all();

$sellers = Seller::all();

//Include alert of advert creation
$result = $_GET['result'] ?? null;

//Checking the REQUEST_METHOD to check we pass the id to elimate the property
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $propierty = Propierty::findById($id);
        $propierty->delete();
    }
}

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

    <h2>Propierties</h2>
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
            <?php foreach ($propierties as $property) : ?>
                <tr>
                    <td> <?php echo $property->id; ?> </td>
                    <td> <?php echo $property->title; ?> </td>
                    <td><img src="/img/<?php echo $property->image; ?>" alt="Image" class="image-table"></td>
                    <td><?php echo $property->price; ?>€</td>
                    <td>
                        <form method="POST">
                            <!-- Input not visible -->
                            <input type="hidden" name="id" value="<?php echo $property->id; ?>">

                            <input type="submit" class="w-100 button-red-block" value="Delete">
                        </form>
                        <a href="../admin/sellers/update.php?id=<?php echo $property->id ?>" class="button-yellow-block">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <h2>Sellers</h2>

    <table class="propierties">

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($sellers as $seller) : ?>
                <tr>
                    <td> <?php echo $seller->id; ?> </td>
                    <td> <?php echo $seller->name . " " . $seller->surname; ?> </td>
                    <td><?php echo $seller->phone; ?></td>
                    <td>
                        <form method="POST">
                            <!-- Input not visible -->
                            <input type="hidden" name="id" value="<?php echo $seller->id; ?>">

                            <input type="submit" class="w-100 button-red-block" value="Delete">
                        </form>
                        <a href="../admin/properties/update.php?id=<?php echo $seller->id ?>" class="button-yellow-block">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
//Close Connection
mysqli_close($db);
addTemplate('footer');
?>