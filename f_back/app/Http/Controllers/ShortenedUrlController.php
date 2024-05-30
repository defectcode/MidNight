<?php

namespace App\Http\Controllers;

use App\Models\ShortenedUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShortenedUrlController extends Controller
{

    public function testGenerateShortCode()
    {
        $shortCode = $this->generateShortCode();
        Log::info('Generated Short Code: ' . $shortCode);
    }

    private function generateShortCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = 6; 
        
        // Generare aleatoare a codului scurt
        do {
            $shortCode = '';
            for ($i = 0; $i < $length; $i++) {
                $shortCode .= $characters[rand(0, strlen($characters) - 1)];
            }
        } while (ShortenedUrl::where('short_code', $shortCode)->exists());

        return $shortCode;
    }

}
