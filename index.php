<!-- Stampare tutti i nostri hotel con tutti i dati disponibili. -->

<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

var_dump($_GET);

?>

<!doctype html>
<html lang="en">

<head>
    <title>HOTELS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container my-5">

        <div class="row my-3">
            <form class="d-flex gap-4 justify-content-center align-items-center" action="" method="GET">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="parking" name="parking" <?= isset($_GET['parking']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="parking">
                        Parcheggio
                    </label>
                </div>

                <div>
                    <div class="mb-3">
                        <select class="form-select form-select-lg" name="vote" id="vote">
                            <option value=""> <?= !isset($_GET['vote']) && $_GET['vote'] === '' ? 'selected' : ''; ?> Vote</option>
                            <option value="1" <?= isset($_GET['vote']) && $_GET['vote'] === '1' ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?= isset($_GET['vote']) && $_GET['vote'] === '2' ? 'selected' : ''; ?>>2</option>
                            <option value="3" <?= isset($_GET['vote']) && $_GET['vote'] === '3' ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?= isset($_GET['vote']) && $_GET['vote'] === '4' ? 'selected' : ''; ?>>4</option>
                            <option value="5" <?= isset($_GET['vote']) && $_GET['vote'] === '5' ? 'selected' : ''; ?>>5</option>
                        </select>
                    </div>

                </div>
                <button type="submit">Filtra</button>
            </form>
        </div>


        <div class="row my-3">

            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Descrptione</td>
                        <td>Parking</td>
                        <td>Vote</td>
                        <td>Distance to the center</td>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($hotels as $key => $hotel) : ?>

                        <?php if ($hotel['parking']) {
                            $parking = 'si';
                        } else {
                            $parking = 'no';
                        }
                        ?>
                        <tr>
                            <?php if (isset($_GET['parking']) && $hotel['parking'] && ($_GET['vote']) <= $hotel['vote']) : ?>
                                <td><?php echo $hotel['name']; ?></td>
                                <td><?php echo $hotel['description']; ?></td>
                                <td><?php echo $parking; ?></td>
                                <td><?php echo $hotel['vote']; ?></td>
                                <td><?php echo $hotel['distance_to_center']; ?></td>
                            <?php elseif (!isset($_GET['parking']) && ($_GET['vote']) <= $hotel['vote']) : ?>
                                <td><?php echo $hotel['name']; ?></td>
                                <td><?php echo $hotel['description']; ?></td>
                                <td><?php echo $parking; ?></td>
                                <td><?php echo $hotel['vote']; ?></td>
                                <td><?php echo $hotel['distance_to_center']; ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    <?php ?>

                </tbody>
            </table>

        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>