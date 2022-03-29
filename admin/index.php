<?php
$result = $_GET['result'] ?? null;
require '../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Admin</h1>
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
            <tr>
                <td>1</td>
                <td>Example Title</td>
                <td><img src="/img/3d6fe7c6b53204c88cbdb4f6bcee9718.jpg" alt="Image" class="image-table"></td>
                <td>500000</td>
                <td>
                    <a href="#" class="button-red-block">Eliminate</a>
                    <a href="#" class="button-yellow-block">Update</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>

<?php
addTemplate('footer');
?>