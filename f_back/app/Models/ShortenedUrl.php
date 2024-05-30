<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenedUrl extends Model
{
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $shortCode = $this->generateShortCode();
        
        ShortenedUrl::create([
            'original_url' => $request->original_url,
            'short_code' => $shortCode
        ]);

        return response()->json(['short_code' => $shortCode], 201);
    }

    private function generateShortCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortCode = '';
        $length = 10; // Lungimea codului scurt

        // Generare aleatoare a codului scurt
        for ($i = 0; $i < $length; $i++) {
            $shortCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Verificăm dacă codul generat este unic în baza de date
        // Dacă nu este unic, generăm un alt cod scurt până găsim unul unic
        while (ShortenedUrl::where('short_code', $shortCode)->exists()) {
            $shortCode = '';
            for ($i = 0; $i < $length; $i++) {
                $shortCode .= $characters[rand(0, strlen($characters) - 1)];
            }
        }

        return $shortCode;
    }


}
