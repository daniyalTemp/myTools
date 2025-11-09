<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden - Pineapple Error</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #1e1e1f;
            color: #f0f0f0;
            text-align: center;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .error-container {
            max-width: 700px;
            margin: 0 auto;
            background: #2a2a2b;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border: 1px solid #444;
        }

        h1 {
            font-size: 120px;
            color: #ff6b6b;
            margin-bottom: 10px;
            text-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #ddd;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #aaa;
            line-height: 1.6;
        }

        .pineapple {
            font-size: 140px;
            margin: 20px 0;
            color: #FFD700;
            display: inline-block;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            animation: bounce 2.5s infinite, glow 3s infinite alternate;
            transform-origin: center;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0) rotate(0deg) scale(1); }
            25% { transform: translateY(-30px) rotate(10deg) scale(1.1); }
            50% { transform: translateY(0) rotate(0deg) scale(1); }
            75% { transform: translateY(-15px) rotate(-10deg) scale(1.05); }
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px rgba(255, 215, 0, 0.6); }
            to { text-shadow: 0 0 30px rgba(255, 215, 0, 0.9), 0 0 40px rgba(255, 215, 0, 0.5); }
        }

        .pineapple-text {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            font-size: 52px;
            color: #FFD700;
            margin: 10px 0 30px;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
            letter-spacing: 2px;
        }

        .btn {
            display: inline-block;
            padding: 14px 30px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 18px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(76, 175, 80, 0.3);
            margin-top: 20px;
        }

        .btn:hover {
            background: #45a049;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(76, 175, 80, 0.4);
        }

        .btn i {
            margin-right: 8px;
        }

        .error-code {
            font-family: monospace;
            background: #3a3a3a;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin: 15px 0;
            color: #ff9999;
        }

        .footer {
            margin-top: 40px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="error-container">
    <div class="pineapple">🍍</div>
    <div class="pineapple-text">PINEAPPLE ERROR!</div>
    <h1>403</h1>
    <h2>Access Forbidden</h2>
    <p>Oops! It seems the pineapple guardians are not letting you through!<br>You don't have permission to access this page.</p>

    <div class="error-code">Error Code: 403_FORBIDDEN</div>

    <!-- 🟩 Added Return Button -->
    <button class="btn" onclick="history.back()">
        <i class="fa-solid fa-arrow-left"></i> Return
    </button>
</div>

<div class="footer">
    &copy; 2023 Your Website • Pineapple Protection System
</div>

<script>
    // Interactive pineapple animation
    const pineapple = document.querySelector('.pineapple');

    pineapple.addEventListener('mouseover', () => {
        pineapple.style.animation = 'none';
        pineapple.style.transform = 'scale(1.3) rotate(360deg)';
        setTimeout(() => {
            pineapple.style.animation = 'bounce 2.5s infinite, glow 3s infinite alternate';
        }, 1000);
    });

    // Add floating pineapples in background
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.querySelector('body');
        for (let i = 0; i < 15; i++) {
            const floatingPineapple = document.createElement('div');
            floatingPineapple.innerHTML = '🍍';
            floatingPineapple.style.position = 'fixed';
            floatingPineapple.style.fontSize = Math.random() * 30 + 10 + 'px';
            floatingPineapple.style.left = Math.random() * 100 + 'vw';
            floatingPineapple.style.top = Math.random() * 100 + 'vh';
            floatingPineapple.style.opacity = Math.random() * 0.3 + 0.1;
            floatingPineapple.style.pointerEvents = 'none';
            floatingPineapple.style.zIndex = '-1';
            floatingPineapple.style.animation = `float ${Math.random() * 10 + 15}s infinite linear`;
            body.appendChild(floatingPineapple);

            const style = document.createElement('style');
            style.innerHTML = `
                    @keyframes float {
                        0% { transform: translate(0, 0) rotate(0deg); }
                        50% { transform: translate(${Math.random() * 50 - 25}px, ${Math.random() * 50 - 25}px) rotate(180deg); }
                        100% { transform: translate(0, 0) rotate(360deg); }
                    }
                `;
            document.head.appendChild(style);
        }
    });
</script>
</body>
</html>
