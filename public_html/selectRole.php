<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Selección de Sesión</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="assets/css/app.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
    <style>
        body {
            background-color: black;
        }

        .pace-done {
            background-image: url(assets/img/dashboard-cover-5.jpg);
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>
    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed app-content-full-width">

        <!-- BEGIN #content -->
        <div id="content" class="app-content" style="align-content: center; color: white;">
            <div style="text-align: center; bac">
                <div class="mb-2 mt-2"><img src="assets/img/user-5.jpg" width="85" class="img-circle" alt="" /></div>
                <h4 id="nameUser" idAux="" ; class="widget-title" style="font-size: 20px;"></h4>
                <br>
                <p class="widget-desc widget-desc-inverse" style="font-size: 15px;">Deseas iniciar sesión como:</p>
                <hr class="hr-inverse-transparent" />
                <div id="rowRoles" class="row m-b-2">
                </div>
            </div>
        </div>
        <!-- END #content -->
        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->
    </div>
    <!-- END #app -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/js/app.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <script src="assets/js/app/selectRole.js"></script>
	<script src="assets/js/notify/notify.js"></script>
</body>

</html>