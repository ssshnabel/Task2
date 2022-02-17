<?php
require_once "db.inc.php";
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
        <div class="toolbar">
            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="block" title="Block">
                <img class= "button-image" src="icons/block.svg"> Block
            </button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="unblock" title="Unblock">
                <img class= "button-image" src="icons/unblock.svg"> Unblock
            </button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="delete" title="Delete">
                <img class= "button-image" src="icons/delete.svg"> Delete
            </button>
        </div>
        <div class="full-table">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="select_all" id="select_all">
                            <label class="form-check-label" for="select_all">
                                Select all
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="remove_selection" id="remove_selection">
                            <label class="form-check-label" for="remove_selection">
                                Remove selection
                            </label>
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
                </tbody>
            </table>
        </div>

    </main>
</body>
</html>