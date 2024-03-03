<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="p.css" rel="stylesheet">
  <title>gallery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
</head>
<body>

<div class="global-container">
    <div class="card login-form ">
      <div class="card-body">
        <h1 class="card-title text-center">LOGIN</h1>
        <form action="<?= base_url()?>Auth/proses_login" method="post">
      </div>
      <div class="card-text">
        <?= $this->session->set_flashdata('info')?>
          <div class="mb-3">
            <label>username</label>
            <input type="text" name="username" class="form-control" placeholder="masukan username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="mb-3">
            <label>password</label>
            <input type="password" name="password" class="form-control" placeholder="masukan password" required>
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div>
          	 <button type="submit" class="btn btn-primary btn-grad btn-grad:hover">Login</button>
          </div>
          <div>
             <p>Belum punya akun?<a href="<?php echo base_url('auth/register') ?>" class="text-gradient font-weight-bold"> registrasi</a> dulu</p>
          </div>
        </form>

      </div>
    </div>
  </div>
  <style>
    html,
body {
    height: 100%;
    background-color: #00A9FF;
}

.global-container {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: black;
}

.login-form {
    width: 380px;
    height: 400px;
    padding: 20px;
    background-color: white !important;
}


.btn-primary {
	width: 100%;          
	background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5  51%, #00d2ff  100%);
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;            
    box-shadow: 0 0 20px #eee;
    border-radius: 10px;
    display: block;
}


  </style>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>
</html>

</body>
</html>