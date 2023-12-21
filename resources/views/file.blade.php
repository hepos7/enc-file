<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>File Upload Page</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ url('/css/file.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('/js/file.js') }}"></script>
</head>
<body>

<div class="container">

    <form action="/procces" method="post" enctype="multipart/form-data">
        @csrf

    <label id="file-label" for="file-input">Select a file</label>
    <input type="file" id="file-input" name="file" onchange="updateFileName()">

    <div id="file-details" class="container">
        <div>
            <label >Name: </label>
            <label id="name"></label>
        </div>
        <div>
            <label >Size: </label>
            <label id="size"></label>
        </div>
        <div>
            <label >Extension: </label>
            <label id="extension"></label>
        </div>
        <div>
            <label >Type: </label>
            <label id="type"></label>
        </div>
        
        <div class="styled-select">
            <select name="action">
                <option value="encryption">Encrypt File</option>
                <option value="decryption">Decrypt File</option>
            </select>
        </div>
    </div>

    

    <button id="submit-btn" type="submit" >Submit</button>
</form>

</div>



</body>
</html>
