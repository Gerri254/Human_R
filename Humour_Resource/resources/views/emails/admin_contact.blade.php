<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; color: #0A192F; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; }
        .header { background-color: #0A192F; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .header h1 { color: #C5A059; margin: 0; font-family: serif; }
        .content { padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #C5A059; font-size: 0.9em; text-transform: uppercase; }
        .value { background: #f9fafb; padding: 10px; border-radius: 4px; margin-top: 5px; }
        .footer { text-align: center; font-size: 0.8em; color: #6b7280; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Inquiry Received</h1>
        </div>
        <div class="content">
            <p>You have received a new message from the <strong>Humour Resource</strong> contact form.</p>
            
            <div class="field">
                <div class="label">Name</div>
                <div class="value">{{ $contactMessage->first_name }} {{ $contactMessage->last_name }}</div>
            </div>

            <div class="field">
                <div class="label">Email</div>
                <div class="value">{{ $contactMessage->email }}</div>
            </div>

            <div class="field">
                <div class="label">Phone</div>
                <div class="value">{{ $contactMessage->phone ?? 'N/A' }}</div>
            </div>

            <div class="field">
                <div class="label">Subject</div>
                <div class="value">{{ $contactMessage->subject }}</div>
            </div>

            <div class="field">
                <div class="label">Message</div>
                <div class="value">{!! nl2br(e($contactMessage->message)) !!}</div>
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Humour Resource System
        </div>
    </div>
</body>
</html>
