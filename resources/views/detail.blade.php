<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
    {{-- @foreach ($pathDecoded as $item)
        $item
    @endforeach --}}

    <iframe src="{{url('storage/img/'.$data->path)}}" frameborder="0"></iframe>
    </table>
</body>
</html>