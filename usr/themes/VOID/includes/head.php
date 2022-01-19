<?php
/**
 * head.php
 * 
 * <head>
 * 
 * @author      熊猫小A
 * @version     2019-01-15 0.1
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$setting = $GLOBALS['VOIDSetting']; 

if (isset($_POST['void_action'])) {
    if ($_POST['void_action'] == 'getLoginAction') {
        echo $this->options->loginAction;
        exit;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="<?php $this->options->charset(); ?>">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="renderer" content="webkit">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php 
    $banner = '';
    $description = '';
    if($this->is('post') || $this->is('page')){
        if($this->fields->banner != '')
            $banner=$this->fields->banner;
        if($this->fields->excerpt != '')
            $description = $this->fields->excerpt;
    }else{
        $description = Helper::options()->description;
    }
    ?>
    <title><?php Contents::title($this); ?></title>
    <meta name="author" content="<?php $this->author(); ?>" />
    <meta name="description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
        <meta name="google-translate-customization" content="108d9124921d80c3-80e20d618ff053c8-g4f02ec6f3dba68b7-c"></meta>
    <meta property="og:title" content="<?php Contents::title($this); ?>" />
    <meta property="og:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
    <meta property="og:site_name" content="<?php Contents::title($this); ?>" />
    <meta property="og:type" content="<?php if($this->is('post') || $this->is('page')) echo 'article'; else echo 'website'; ?>" />
    <meta property="og:url" content="<?php $this->permalink(); ?>" />
    <meta property="og:image" content="<?php echo $banner; ?>" />
    <meta property="article:published_time" content="<?php echo date('c', $this->created); ?>" />
    <meta property="article:modified_time" content="<?php echo date('c', $this->modified); ?>" />
    <meta name="twitter:title" content="<?php Contents::title($this); ?>" />
    <meta name="twitter:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:image" content="<?php echo $banner; ?>" />
    <?php $this->header('commentReply=&description=&'); ?>

    <!--CSS-->
    <link rel="stylesheet" href="<?php Utils::indexTheme('/assets/bundle-1e9bf597b1.css');?>">
    <link rel="stylesheet" href="<?php Utils::indexTheme('/assets/VOID-85f5618f4c.css');?>">
    <link rel="stylesheet" href="<?php Utils::indexTheme('/assets/head.css');?>">




<!--<div id="google_translate_element" style="position:fixed;bottom:320px;left:30px;z-index:2000;opacity:0.7"></div>-->

<!--<div style="position:fixed;bottom:270px;left:30px;z-index:2000;opacity:0.7;color:#02F78E">单击右上角的× <br/>可以关闭翻译模式~</div>-->

<!--
<script>
function googleTranslateElementInit() {
 
	new google.translate.TranslateElement(
		{
                //这个参数不起作用，看文章底部更新，翻译面板的语言
                pageLanguage: 'en',
            //这个是你需要翻译的语言，比如你只需要翻译成越南和英语，这里就只写en,vi
			includedLanguages: 'en,zh-CN,ja',
            //选择语言的样式，这个是面板，还有下拉框的样式，具体的记不到了，找不到api~~
			layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            //自动显示翻译横幅，就是翻译后顶部出现的那个，有点丑，这个属性没有用的话，请看文章底部的其他方法
			autoDisplay: false, 
			//还有些其他参数，由于原插件不再维护，找不到详细api了，将就了，实在不行直接上dom操作
		}, 
		'google_translate_element'//触发按钮的id
	);
 
}
</script>
-->

<!--<script src="https://translate.google.cn/translate_a/element.js?cb=googleTranslateElementInit"></script>-->

    <!--JS-->
    <script src="<?php Utils::indexTheme('/assets/bundle-header-25184848f0.js'); ?>"></script>

    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script>
        L2Dwidget.init({
            "model": {
                "jsonPath": "https://unpkg.com/live2d-widget-model-tororo@1.0.5/assets/tororo.model.json",
	<!--"jsonPath": "https://github.com/hanquansanren/live2dDemo/blob/master/assets/22.default/22.default.model.json",-->
                "scale": 1
            },
            "display": {
                "position": "left",
                "width": 150,
                "height": 300,
                "hOffset": 0,
                "vOffset": -20
            },
            "mobile": {
                "show": true,
                "scale": 0.3
            },
            "react": {
                "opacityDefault": 0.7,
                "opacityOnHover": 0.4
            }
        });
    </script>

    <script>
    VOIDConfig = {
        PJAX : <?php echo $setting['pjax'] ? 'true' : 'false'; ?>,
        searchBase : "<?php Utils::index("/search/"); ?>",
        home: "<?php Utils::index("/"); ?>",
        buildTime : "<?php Utils::getBuildTime(); ?>",
        enableMath : <?php echo $setting['enableMath'] ? 'true' : 'false'; ?>,
        lazyload : <?php echo $setting['lazyload'] ? 'true' : 'false'; ?>,
        colorScheme:  <?php echo $setting['colorScheme']; ?>,
        headerMode: <?php echo $setting['headerMode']; ?>,
        followSystemColorScheme: <?php echo $setting['followSystemColorScheme'] ? 'true' : 'false'; ?>,
        VOIDPlugin: <?php echo $setting['VOIDPlugin'] ? 'true' : 'false'; ?>,
        votePath: "<?php Utils::index('/action/void?'); ?>",
        lightBg: "",
        darkBg: "",
        lineNumbers: <?php echo $setting['lineNumbers'] ? 'true' : 'false'; ?>,
        darkModeTime: {
            'start': <?php echo $setting['darkModeTime']['start']; ?>,
            'end': <?php echo $setting['darkModeTime']['end']; ?>
        },
        horizontalBg: <?php echo empty($setting['siteBg']) ? 'false' : 'true'; ?>,
        verticalBg: <?php echo empty($setting['siteBgVertical']) ? 'false' : 'true'; ?>,
        indexStyle: <?php echo $setting['indexStyle']; ?>,
        version: <?php echo $GLOBALS['VOIDVersion'] ?>,
        isDev: true
    }
    </script>
    <script src="<?php Utils::indexTheme('/assets/header-dba1d6f214.js'); ?>"></script>
    





    <?php echo $setting['head']; ?>
    <style>
        <?php if(!empty($setting['desktopBannerHeight'])): ?>
        @media screen and (min-width: 768px){
            main>.lazy-wrap{min-height: <?php echo $setting['desktopBannerHeight']; ?>vh;}
        }
        <?php endif; ?>

        <?php if(!empty($setting['mobileBannerHeight'])): ?>
        @media screen and (max-width: 768px){
            main>.lazy-wrap{min-height: <?php echo $setting['mobileBannerHeight']; ?>vh;}
        }
        <?php endif; ?>
    </style>

    <?php if (array_key_exists('src', $setting['brandFont']) && !empty($setting['brandFont']['src'])): ?>
    <style>
    @font-face {
        font-family: "BrandFont";
        src: url("<?php echo $setting['brandFont']['src']; ?>");
    }
    .brand {
        font-family: BrandFont, sans-serif;
        font-style: <?php echo $setting['brandFont']['style']; ?>!important;
        font-weight: <?php echo $setting['brandFont']['weight']; ?>!important;
    }
    </style>
    <?php endif; ?>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <?php if(Utils::isSerif($setting)): ?>
        <link id="stylesheet_noto" href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:300,400,700&display=swap&subset=chinese-simplified" rel="stylesheet">
    <?php endif; ?>

    <?php if($setting['useFiraCodeFont']): ?>
        <link href="https://fonts.googleapis.com/css?family=Fira+Code&display=swap" rel="stylesheet">
        <style>.yue code, .yue tt {font-family: "Fira Code", Menlo, Monaco, Consolas, "Courier New", monospace}</style>
    <?php endif; ?>

    </head>