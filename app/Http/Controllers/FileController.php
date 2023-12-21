<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileController extends Controller
{

    public function proccesFile(Request $request)
    {
        //validate data
        $request->validate([
            'file' => 'required|file',
            'action' => 'required|string'
        ],);


        $file = $request->file('file');
        $action = $request->input('action');


        // File details
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $fileExtension = $file->getClientOriginalExtension();

        // Read the content of the file
        $fileContent = file_get_contents($file);

        
        
        if ($action == "encryption") {
            // Generate an IV (Initialization Vector)
            $iv = openssl_random_pseudo_bytes(16);
    
            // Encrypt the content using openssl_encrypt
            $processedContent = openssl_encrypt($fileContent, 'aes-256-cbc', config('app.key'), 0, $iv);

            $processedContent= $iv . $processedContent;

            // Save the file with a new name
            $processedFileName = 'encrypted_' . $fileName;
        } else {

           try{
                // Extract IV (Initialization Vector) from the stored file
                $iv = substr($fileContent, 0, 16);
                $encryptedContent = substr($fileContent, 16);
    
                // Decrypt the content using openssl_decrypt
                $processedContent = openssl_decrypt($encryptedContent, 'aes-256-cbc', config('app.key'), 0, $iv);
        
                // Save the file with a new name
                $processedFileName = 'decrypted_' . $fileName;
           }catch (\Exception $e){

                // Handle decryption error
                return redirect()->back()->withErrors(['error' => 'Failed to decrypte the file'])->withInput();

            }
        }


        Storage::disk('public/' . $action)->put($processedFileName, $processedContent);
        

        return view('details', [
            'fileName' => $fileName,
            'fileSize' => $fileSize,
            'fileExtension' => $fileExtension,
            'processedFileName' => $processedFileName,
            'filePath' => $action. '/' . $processedFileName,
        ]);


    }


    
}
