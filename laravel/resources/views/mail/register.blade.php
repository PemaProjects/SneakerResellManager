<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
            color: #333333;
        }
        .content {
            padding: 20px 0;
        }
        .content p {
            margin: 0 0 15px;
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #e0e0e0;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gracias por registrate</h1>
        </div>
        <div class="content">
            <p>Hola {{ $name }},</p>
            <p>Nos complace darte la bienvenida a nuestra comunidad. Estamos encantados de tenerte con nosotros y esperamos que disfrutes de todas las ventajas y recursos que ofrecemos.</p>
            <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte.</p>
            <p>Saludos cordiales,</p>
            <p>El Equipo de Snkrs</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Snkrs. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
