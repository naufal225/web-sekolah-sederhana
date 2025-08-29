<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:120',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Save to database
            $contactMessage = ContactMessage::create($request->all());

            $this->sendEmailNotification($contactMessage);

            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda berhasil dikirim. Terima kasih!'
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send contact message: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.',
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    private function sendEmailNotification($contactMessage)
    {
        try {
            $adminEmail = env('ADMIN_EMAIL', 'naufalmarufashrori225@gmail.com');

            Mail::to($adminEmail)->send(new ContactMessageMail($contactMessage));

        } catch (\Exception $e) {
            Log::error('Email could not be sent: ' . $e->getMessage());
            throw $e;
        }
    }
}
