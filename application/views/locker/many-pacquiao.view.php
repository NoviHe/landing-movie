<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .tombolKustom {
            box-shadow: 3px 4px 0px 0px #00bfff;
            background: linear-gradient(to bottom, #000000 5%, #0066ff 100%);
            background-color: #000000;
            border-radius: 19px;
            border: 1px solid #000000;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Verdana;
            font-size: 17px;
            font-weight: bold;
            padding: 13px 76px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #000000;
        }

        .tombolKustom:hover {
            background: linear-gradient(to bottom, #0066ff 5%, #000000 100%);
            background-color: #0066ff;
        }

        .tombolKustom:active {
            position: relative;
            top: 1px;
        }
    </style>
</head>

<body>
    <section class="container">
        <div class="row mt-5 pt-2 text-center">
            <div class="col-md-12 mb-2">
                <h4>Manny Pacquiao</h4>
                <img class="img-thumbnail" src="<?= BASE_PATH; ?>/public/img/many-pacquiao/photo_2023-09-18_19-08-24.jpg" alt="">
            </div>
            <div class="col-md-12 mb-2">
                <p>Click on <strong>"ENTER HERE"</strong> to continue to the next step</p>
                <button class="tombolKustom" onclick="_tx()">ENTER HERE!</button><br>
            </div>
            <div class="col-md-12 mb-2">
                <img class="img-thumbnail mt-1" src="<?= BASE_PATH; ?>/public/img/many-pacquiao/meta.gif" alt="">
            </div>
            <div class="col-md-12">
                <div class="fotter__offer">Copyright © 2023 | Manny Pacquiao.</div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
        var oDajn_mzp_uWDnuc = {
            "it": 4178726,
            "key": "9f193"
        };
    </script>
    <script src="https://d368ol0wkasvru.cloudfront.net/d602204.js"></script>
    <?php echo histats_code() ?>
</body>

</html>