<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        How to load notification alert on top
        right corner without click of button
        in bootstrap ?
    </title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        #notification {
            position: absolute;
            top: 0;
            right: 0;
        }

        #para {
            border: 1px solid black;
            width: 300px;
            height: 100px;
            overflow: scroll;
        }

        .toast-color {
            color: white;
            background-color: green;
        }
    </style>
</head>

<body>

    <div class="toast toast-color" id="notification" data-delay="3000">
        <div class="toast-header toast-color">
            <strong class="mr-auto">Thông báo</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="toast-body">
            Đồ án đã được cập nhật
        </div>
    </div>

    <script>
        $(document).ready(function() {

            

        });
    </script>
</body>

</html>
