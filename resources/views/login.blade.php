<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class="mt-4" method="post" >
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email" autocomplete="off" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required>
        </div>

        <div class="sign-info">
            <button type="submit" class="btn btn-hover">Sign in</button>
            
        </div>
    </form>
</body>
</html>