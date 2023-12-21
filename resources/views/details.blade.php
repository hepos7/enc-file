<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Details</title>
    <link href="{{ url('/css/details.css') }}" rel="stylesheet" type="text/css">
    <style>
        
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

    <a id="return" href="{{ route('home') }}" >
        Upload New File
    </a>
</body>
</html>
