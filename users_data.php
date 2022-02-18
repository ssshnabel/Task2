<?php

$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "task3";

$connect = mysqli_connect($host, $dbUsername, null, $dbName, 3306);
if (!$connect){
    die("Connection error").mysqli_connect_error();
}

$users = mysqli_query($connect, "SELECT * FROM `users`");
$users = mysqli_fetch_all($users);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title> Task3 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="users_data.css" rel="stylesheet">
</head>
<body class="text-center">
        <main>
            <a class="index-link" href="index.php"> Click here to return to the main page </a>
            <div class="toolbar">
                <form action="users_data_process.php" method="post">
                    <button type="submit" name="block" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="block" title="Block">
                        <img class= "button-image" src="icons/block.svg"> Block
                    </button>

                    <button type="submit" name="unblock" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="unblock" title="Unblock">
                        <img class= "button-image" src="icons/unblock.svg"> Unblock
                    </button>

                    <button type="submit" name="delete" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="delete" title="Delete">
                        <img class= "button-image" src="icons/delete.svg"> Delete
                    </button>
                </form>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <?php
                    $selectAll = $_POST['$select_all'];
                    $removeSelection = $_POST['$remove_selection'];
                    ?>
                    <th scope="col">
                        <div class="form-check">
                            <form action="users_data.php" method="post">
                                <input class="form-check-input" name="select_all" type="checkbox" value="select_all" id="select_all">
                                <label class="form-check-label" for="select_all">
                                    Select all
                                </label>
                            </form>
                            <form>
                                <input class="form-check-input" name="remove_selection" type="checkbox" value="remove_selection" id="remove_selection">
                                <label class="form-check-label" for="remove_selection">
                                    Remove selection
                                </label>
                            </form>
                        </div>
                    </th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Register date</th>
                    <th scope="col">Last login date</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($users as $info){
                ?>
                    <tr scope="row">
                       <td>
                           <div class="form-check">
                               <form action="users_data_process.php" method="post">
                                   <input class="form-check-input" type="checkbox" name="select_user[<?= $info[0] ?>]"
                                       <?php if (isset($selectAll)){ echo 'checked="checked"'; }
                                       if (isset($removeSelection)){ echo 'checked=""'; } ?> value="select_user" id="select_user">
                               </form>
                           </div>
                       </td>
                        <td> <?= $info[0] ?> </td>
                        <td> <?= $info[2] ?> </td>
                        <td> <?= $info[3] ?> </td>
                        <td> <?= $info[4] ?> </td>
                        <td> <?= $info[6] ?> </td>
                        <td> <?= $info[5] ?> </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
    </main>
</body>
</html>