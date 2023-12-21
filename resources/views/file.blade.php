<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>File Upload Page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="file"] {
            display: none;
        }

        #file-label {
            
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }


        #file-label:hover {
            background-color: #2980b9;
        }

        #file-label {
            margin-bottom: 20px;
        }

        button {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #27ae60;
        }
         /* Basic styling for the dropdown container */
         .styled-select {
            display: inline-block;
            position: relative;
            font-family: Arial, sans-serif;
        }

        /* Styling for the select element */
        .styled-select select {
            background-color: #3498db;
            color: white;
            padding: 10px;
            padding-right: 30px; /* To accommodate the arrow icon */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            appearance: none; /* Remove default arrow in some browsers */
            cursor: pointer;
        }

        /* Styling for the arrow icon */
        .styled-select::after {
            content: '\25BC'; /* Unicode character for down arrow */
            font-size: 16px;
            color: white;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
    </style>
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
        
        
    </div>

    <div class="styled-select">
        <select name="action">
            <option value="encryption">Encrypt File</option>
            <option value="decryption">Decrypt File</option>
        </select>
    </div>

    <button id="encrypt-btn" type="submit" >Submit</button>
</form>

</div>

<script>
    function updateFileName() {
        const fileInput = document.getElementById('file-input');
        const fileLabel = document.getElementById('file-label');
        const name = document.getElementById('name');
        const size = document.getElementById('size');
        const extension = document.getElementById('extension');
        const type = document.getElementById('type');
        const encryptBtn = document.getElementById('encrypt-btn');
        const decryptBtn = document.getElementById('decrypt-btn');

        if (fileInput.files.length > 0) {
            name.textContent = fileInput.files[0].name;
            size.textContent = (fileInput.files[0].size / (1024)).toFixed(2) + ' KB';
            extension.textContent = fileInput.files[0].name.split('.').pop();
            type.textContent = fileInput.files[0].type;
            encryptBtn.style.display = 'inline';
            decryptBtn.style.display = 'inline';
        } else {
            fileLabel.textContent = 'Select a file';
            encryptBtn.style.display = 'none';
            decryptBtn.style.display = 'none';
        }
    }



    

</script>

</body>
</html>
