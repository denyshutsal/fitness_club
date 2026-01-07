<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visitor Credentials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 8px;
            background-color: #fafafa;
        }
        h2 {
            color: #2d3748;
        }
        .credentials {
            background-color: #f1f5f9;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 10px;
            font-family: monospace;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
	<body>
		<div class="container">
			<h2>Hello {{ $visitor->name }},</h2>

			<p>You have been added to our system. Here are your access credentials:</p>

			<div class="credentials">
				Email: {{ $visitor->email }}<br>
				Password: {{ $password }}
			</div>

			<p>For security reasons, please change your password after your first login.</p>

			<p>Best regards,<br>The Admin Team</p>
		</div>
	</body>
</html>
