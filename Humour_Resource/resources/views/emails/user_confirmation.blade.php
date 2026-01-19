<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; color: #0A192F; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; }
        .header { background-color: #0A192F; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .header h1 { color: #C5A059; margin: 0; font-family: serif; }
        .content { padding: 30px; }
        .btn { display: inline-block; background-color: #C5A059; color: #0A192F; padding: 12px 24px; text-decoration: none; border-radius: 4px; font-weight: bold; margin-top: 20px; }
        .footer { text-align: center; font-size: 0.8em; color: #6b7280; margin-top: 20px; border-top: 1px solid #e5e7eb; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Message Received</h1>
        </div>
        <div class="content">
            <p>Dear {{ $contactMessage->first_name }},</p>
            
            <p>Thank you for reaching out to <strong>Humour Resource</strong>. We have successfully received your inquiry regarding <strong>{{ $contactMessage->subject }}</strong>.</p>
            
            <p>One of our narrative strategists will review your message and get back to you shortly (usually within 24 hours).</p>
            
            <p>In the meantime, feel free to explore our latest insights.</p>

            <div style="text-align: center;">
                <a href="{{ route('blog') }}" class="btn">Read Our Chronicles</a>
            </div>
        </div>
        <div class="footer">
            <p>Humour Resource | Westlands, Nairobi</p>
            <p>&copy; {{ date('Y') }} NarrativeHR Excellence.</p>
        </div>
    </div>
</body>
</html>
