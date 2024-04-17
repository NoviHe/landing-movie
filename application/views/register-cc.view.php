<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noindex">
  <title>Register Loading...</title>
  <meta http-equiv="refresh" content="2;url=<?php echo OFFER_LINK1 . $sub_id; ?>">

  <style>
    .loading-redirect {
      height: 100vh;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
    }

    .text-center {
      text-align: center !important;
    }

    .lds-dual-ring {
      display: inline-block;
      width: 64px;
      height: 64px;
    }

    .lds-dual-ring:after {
      content: " ";
      display: block;
      width: 46px;
      height: 46px;
      margin: 1px;
      border-radius: 50%;
      border: 5px solid #222;
      border-color: #222 transparent #222 transparent;
      animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .ads-728x90 {
      padding-bottom: 10px;
    }

    .ads-468x60 {
      padding-bottom: 10px;
    }

    .ads-300x250 {
      margin-bottom: 10px;
    }

    .ads-160x300 {
      margin-top: 10px;
    }

    @media only screen and (max-width: 750px) {
      .ads-728x90 {
        display: none;
      }

      .ads-468x60 {
        display: none;
      }
    }
  </style>

  <?php echo histats_code() ?>

</head>

<body class="text-center">

  <div class="loading-redirect">
    <div class="lds-dual-ring"></div>
  </div>

</body>

</html>