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

        $type = $_POST['type'];

        if (validateTypeContent($type)) {

            if ($type === 'seller') {
                $seller = Seller::findById($id);
                $seller->delete();
            } else if ($type === 'propierty') {
                $propierty = Propierty::findById($id);
                $propierty->delete();
            }
        }
    }
}

addTemplate('header');
?>

<main class="container section">
    <h1>Admin</h1>

    <?php
    $messaje = showNotification(intval($result));
    if ($messaje) { ?>
        <p class="alert success"><?php echo sanitization($messaje) ?> </p>
    <?php }
    ?>

    <a href="/admin/properties/create.php" class="button-green-inline">Create New Property</a>
    <a href="/admin/seller/create.php" class="button-green-inline">Create New Seller</a>

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
                            <input type="hidden" name="type" value="propierty">

                            <input type="submit" class="w-100 button-red-block" value="Delete">
                        </form>
                        <a href="../admin/properties/update.php?id=<?php echo $property->id ?>" class="button-yellow-block">Update</a>
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
                            <input type="hidden" name="type" value="seller">

                            <input type="submit" class="w-100 button-red-block" value="Delete">
                        </form>
                        <a href="../admin/seller/update.php?id=<?php echo $seller->id ?>" class="button-yellow-block">Update</a>
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