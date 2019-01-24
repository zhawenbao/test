<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>聊天室</title>
</head>
<body>
        <div style="width: 500px; margin: 200px 500px">
            <form action="" method="get">
                {{--<input type="hidden" name="" value="{{ csrf_field() }}">--}}
                username : <input type="text" name="username" value="" style="margin: 50px 100px"> <br />
                message  : <input type="text" name="message"  value="" style="margin: 50px 100px"><br />
                <input type="submit" value="send" name="sub"><br />
            </form>
        </div>
</body>
</html>