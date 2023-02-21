<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Lupa Password</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=asset('assets-aqua/img/favicon.ico')?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=routeTo('assets/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=routeTo('assets/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=routeTo('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=routeTo('assets/css/atlantis.min.css')?>">
</head>
<body style="min-height:auto;">
	<div class="container">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                <div class="card full-height">
                    <?php if($success_msg): ?>
                    <div class="alert alert-success"><?=$success_msg?></div>
                    <?php endif ?>
    
                    <?php if($error_msg): ?>
                    <div class="alert alert-danger"><?=$error_msg?></div>
                    <?php endif ?>
                    <div class="card-body">
                        <center>
                            <img src="<?=routeTo('assets/img/main-logo.png')?>" width="150px" height="100px" alt="logo" style="object-fit:contain;">
                        </center>
                        <div class="card-title text-center">Lupa Password</div>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="" class="form-control mb-2" placeholder="Email Disini...">
                                <button class="btn btn-primary btn-block btn-round">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>