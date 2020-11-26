<!doctype html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="style/bootstrap-4.5.3/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style/css/main.css">
        <title>Опрос</title>
    </head>
    <body>
    <script language="JavaScript" type="text/javascript" src="style/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="style/bootstrap-4.5.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <div class="wrapper">
            <div class="header">
                <?php echo $header;?>
            </div>
            <div class="jumbotron">
                <div class="container">
                    <div class="card" id="card-body">
                        <?php echo $body;?>
                    </div>
                </div>
            </div>
            <div class="footer">
                <?php echo $footer;?>
            </div>
        </div>
    <script>
        $('#user_age').on('input', function() {
            $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё!@$%#№:;^&*()_=+?><,."'~`]/, ''))
        });
        $(document).on("submit", "form", function(event) {
            $('#send').attr('disabled', true);
            event.preventDefault();
            var d=new FormData(this);
            $.ajax({
                url: "index.php",
                type: "POST",
                dataType: "JSON",
                data: d,
                processData: false,
                contentType: false,
                success: function (data)
                {
                    $('#card-body').html(data['content']);
                },
            });
        });
    </script>
    </body>
</html>