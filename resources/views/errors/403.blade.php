<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('customer-assets/images/403/error-403.png')}}">
    <title>صفحه 403 | دسترسی غیر مجاز</title>

    <style>
        @font-face {
            font-family: "IRANSans";
            src: url({{asset('customer-assets/fonts/IRANSans/IRANSansWeb.woff2')}});
        }

        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        body .base {
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-direction: column;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        }

        body .base h1 {
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
            font-family: "Ubuntu", sans-serif;
            text-transform: uppercase;
            text-align: center;
            font-size: 26vw;
            display: block;
            margin: 0;
            color: #9ae1e2;
            position: relative;
            z-index: 0;
            animation: colors 0.4s ease-in-out forwards;
            animation-delay: 1.7s;
        }

        body .base h1:before {
            content: "U";
            position: absolute;
            top: -9%;
            right: 40%;
            transform: rotate(180deg);
            font-size: 13vw;
            color: #f6c667;
            z-index: -1;
            text-align: center;
            animation: lock 0.2s ease-in-out forwards;
            animation-delay: 1.5s;
        }

        body .base h2 {
            font-family: "IRANSans", sans-serif;
            color: #9ae1e2;
            font-size: 4vw;
            margin: 0;
            margin-top: -40px;
            text-transform: uppercase;
            text-align: center;
            animation: colors 0.4s ease-in-out forwards;
            animation-delay: 2s;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        }

        body .base h5 {
            font-family: "IRANSans", sans-serif;
            color: #9ae1e2;
            font-size: 1.7vw;
            margin: 0;
            text-align: center;
            opacity: 0;
            animation: show 2s ease-in-out forwards;
            color: #ca3074;
            animation-delay: 3s;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        }

        @keyframes lock {
            50% {
                top: -4%;
            }

            100% {
                top: -6%;
            }
        }

        @keyframes colors {
            50% {
                transform: scale(1.1);
            }

            100% {
                color: #ca3074;
            }
        }

        @keyframes show {
            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="base io">
        <h1 class="io">403</h1>
        <h2>دسترسی غیر مجاز</h2>
        <h5>(متاسفم دوست عزیز...)</h5>
    </div>
</body>

</html>