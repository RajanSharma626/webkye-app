<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        // Save to database
        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'],
            'message' => $validated['message'],
        ]);

        // Send email notification using PHP mail()
        $to = 'rajansharma027626@gmail.com';
        $subject = 'New Contact Form Submission - Webkye';
        
        // Build email body
        $emailBody = "You have received a new contact form submission:\n\n";
        $emailBody .= "Name: " . $validated['name'] . "\n";
        $emailBody .= "Email: " . $validated['email'] . "\n";
        $emailBody .= "Phone: " . ($validated['phone'] ?? 'Not provided') . "\n";
        $emailBody .= "Company: " . ($validated['company'] ?? 'Not provided') . "\n";
        $emailBody .= "Message:\n" . $validated['message'] . "\n\n";
        $emailBody .= "---\n";
        $emailBody .= "Submitted at: " . date('Y-m-d H:i:s') . "\n";
        
        // Set email headers
        $headers = "From: noreply@webkye.in\r\n";
        $headers .= "Reply-To: " . $validated['email'] . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // Send email
        @mail($to, $subject, $emailBody, $headers);

        return back()->with('success', 'Thank you! We\'ve received your message.');
    }
}


