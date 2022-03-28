<!doctype html>
<html class="no-js" lang="ko">
    <head>
        <?include("../templates/".$skin_name."/global/head.html.php");?>
    </head>

    <body class="bg-smoky-black">
        <div class="left-sidebar-wrapper" data-sticky_parent>
        <?include("../templates/".$skin_name."/global/header.html.php");?>
        <?=$output?>
        <?include("../templates/".$skin_name."/global/footer.html.php");?>
        <!-- javascript -->
        <script type="text/javascript" src="/js/theme-vendors.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
    </body>
</html>