<?php
require_once $global['systemRootPath'] . 'plugin/YouPHPTubePlugin.php';
$head = YouPHPTubePlugin::getHeadCode();
$custom = "The Best YouTube Clone Ever - YouPHPTube";
if (YouPHPTubePlugin::isEnabled("c4fe1b83-8f5a-4d1b-b912-172c608bf9e3")) {
    require_once $global['systemRootPath'] . 'plugin/Customize/Objects/ExtraConfig.php';
    $ec = new ExtraConfig();
    $custom = $ec->getDescription();
}
$theme = $config->getTheme();
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo $custom; ?>">
<link rel="icon" href="<?php echo $global['webSiteRootURL']; ?>view/img/favicon.png">
<link href="<?php echo $global['webSiteRootURL']; ?>view/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $global['webSiteRootURL']; ?>view/js/webui-popover/jquery.webui-popover.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $global['webSiteRootURL']; ?>view/css/font-awesome-5.0.10/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $global['webSiteRootURL']; ?>view/css/flagstrap/css/flags.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $global['webSiteRootURL']; ?>view/css/font-awesome-5.0.10/svg-with-js/css/fa-svg-with-js.css" rel="stylesheet" type="text/css"/>
<?php
$cssFiles = array();
$cssFiles[] = "view/css/custom/{$theme}.css"; // I had to move it to be the first because the font load
$cssFiles[] = "view/js/seetalert/sweetalert.css";
$cssFiles[] = "view/js/bootgrid/jquery.bootgrid.css";
$cssFiles[] = "view/css/main.css";
$cssFiles = array_merge($cssFiles, YouPHPTubePlugin::getCSSFiles());
$cssURL = combineFiles($cssFiles, "css");
?>
<link href="<?php echo $cssURL; ?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo $global['webSiteRootURL']; ?>view/js/jquery-3.3.1.min.js"></script>
<script>
    var webSiteRootURL = '<?php echo $global['webSiteRootURL']; ?>';

</script>
<style>

</style>
<?php
if (!$config->getDisable_analytics()) {
    ?>
    <script>
        // YouPHPTube Analytics
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-96597943-1', 'auto', 'youPHPTube');
        ga('youPHPTube.send', 'pageview');
    </script>
    <?php
}
echo $config->getHead();
echo $head;
if (!empty($video['users_id'])) {
    if(!empty($video)){
      $userAnalytics = new User($video['users_id']);
      echo $userAnalytics->getAnalytics();
      unset($userAnalytics);
    }
}
?>
