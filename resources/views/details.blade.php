<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #3498db;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h2>File Details:</h2>
    <ul>
        <li>Name: {{ $fileName }}</li>
        <li>Size: {{ $fileSize }} bytes</li>
        <li>Extension: {{ $fileExtension }}</li>
    </ul>

    <h2>Processed File:</h2>
    <a href="{{ Storage::url($filePath) }}" download="{{ $processedFileName }}">
        Download Processed File
    </a>
</body>
</html>
