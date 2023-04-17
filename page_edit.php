<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../MDB5/js/mdb.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSBp0M" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>

    <style>
        body {
            background-color: rgb(235, 250, 253);
            margin-left: 2%;
            margin-right: 2%;
            margin-top: 2%;
        }

        .button1 {
            border: none;
            border-radius: 12%;
            margin-top: 2%;
            margin-bottom: 2%;
            padding: 7px 16px;
            text-align: center;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-left: 90%;
        }
    </style>
</head>

<body>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="Button" class="btn mr-8" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'; border: none;  border-radius: 12%; margin-top: 2%; margin-bottom: 2%;padding: 7px 16px;text-decoration: none;font-size: 18px; margin-right:8%;">
            Hilang
        </button>
        <button type="Button" class="btn mr-8" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'; border: none;  border-radius: 12%; margin-top: 2%; margin-bottom: 2%;padding: 7px 16px;text-decoration: none;font-size: 18px; margin-right:8%;">
            Pencarian
        </button>
        <button type="Button" class="btn mr-8" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'; border: none;  border-radius: 12%; margin-top: 2%; margin-bottom: 2%;padding: 7px 16px;text-decoration: none; font-size: 18px; margin-right:8%;">
            Selesai
        </button>
        <button type="Button" class="btn mr-8" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'; border: none;  border-radius: 12%; margin-top: 2%; margin-bottom: 2%;padding: 7px 16px;text-decoration: none; font-size: 18px; margin-right:8%;">
            <i class="fa fa-trash" style="font-size: 18px;"></i>
        </button>
    </div>
    <hr style="border-top: 2px solid rgb(57,79,110) ; font-weight: bold;">
    <img id="image-preview" src="#" alt="Preview Image" style="max-width: 100%; height: auto;">
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>