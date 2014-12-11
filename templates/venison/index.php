<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
//$doc->addScript('templates/' . $this->template . '/js/template.js');

// Add Stylesheets
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

/*getting alias*/
$menu = &JSite::getMenu();
$active   = $menu->getActive();
$alias = $active->alias;


// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
	<![endif]-->

	<!-- Bootstrap core CSS -->
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/fonts/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/docs.css" rel="stylesheet">
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/venison.css" rel="stylesheet">
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/fonts/stylesheet.css" rel="stylesheet">
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/carousel.css" rel="stylesheet">

</head>

<body class="site <?php echo $option
  . ' alias-' . $alias
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">
<?php



?>



	<section id="header">
        <div class="container">
        <div class="row">
        
        <div class="col-md-6">
        <div class="venison-logo" data-ride="animated" data-animation="fadeInUp" data-delay="300">
            		<a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
						<?php echo $logo; ?>
						<?php if ($this->params->get('sitedescription')) : ?>
							<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
						<?php endif; ?>
					</a>					
        </div>
        </div>
        
        <div class="col-md-6">
        <div class="venison-meat" data-ride="animated" data-animation="fadeInUp" data-delay="300">
        <img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/venison-meat-logo.png" alt="venison meat logo">
        </div>
        </div>
        
        
        </div>
        </div>
    </section>
    
    
    
    <!--body-container-start-here-->
    
    <div class="container">     
    <div class="row">
      <div class="col-md-12">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
        <div class="navbar-collapse collapse main-menu">
        	<?php if ($this->countModules('position-1')) : ?>
				<nav class="navigation" role="navigation">
					<jdoc:include type="modules" name="position-1" style="none" />
				</nav>
			<?php endif; ?>
        </div><!--/.nav-collapse -->
        
	  <div data-ride="carousel" class="carousel slide" id="myCarousel">      
      <jdoc:include type="modules" name="banner" style="xhtml" />      
    </div>
	
    <section class="healthy-services content-main" data-ride="animated" data-animation="fadeInUp" data-delay="300">
    	<div class="heading-alternative">
  	    	<?php if ($this->countModules('position-8')) : ?>
          <!-- Begin Sidebar -->
          <div id="sidebar" class="span3">
            <div class="sidebar-nav">
              <jdoc:include type="modules" name="position-8" style="xhtml" />
            </div>
          </div>
          <!-- End Sidebar -->
        <?php endif; ?>
        <main id="content" role="main" class="<?php echo $span; ?>">
          <!-- Begin Content -->
          <jdoc:include type="modules" name="position-3" style="xhtml" />
          <jdoc:include type="message" />
          <jdoc:include type="component" />
          <jdoc:include type="modules" name="position-2" style="none" />
          <!-- End Content -->
        </main>
        <?php if ($this->countModules('position-7')) : ?>
          <div id="aside" class="span3">
            <!-- Begin Right Sidebar -->
            <jdoc:include type="modules" name="position-7" style="well" />
            <!-- End Right Sidebar -->
          </div>
        <?php endif; ?>
	    </div>      
        <?php if ($this->countModules('position-15')) : ?>          
            <jdoc:include type="modules" name="position-15" style="none" />          
        <?php endif; ?>
    </section>
    </div>
   </div>
   </div>
  
    <!--body-container-close-here-->
    
    
    
    <!--=======footer start here=======-->
    
    <div class="container">
      <div class="row">
     
      
      <div class="col-sm-12">
	<div class="footer">
	  
	<div class="telephone-part">
		<jdoc:include type="modules" name="footer" style="none" />
	  <div class="telephone-number" data-ride="animated" data-animation="fadeInUp" data-delay="300">
	  Tel: +27 11 010 1002 | email <a href="mailto:info@venison.co.za">info@venison.co.za</a><br>
	  <a href="http://www.rainmakermarketing.co.za/"><span>Powered by Rainmaker Marketing.</span></a>
	  </div>
	</div>
	
	<div class="social-part">
		<jdoc:include type="modules" name="debug" style="none" />
	  <div class="social-icon" data-ride="animated" data-animation="fadeInUp" data-delay="300">
	  <ul>
	    <li><a title="facebook" rel='tooltip' data-placement='top' href="http://facebook.com/"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/facebook.png"></a></li>
	    <li><a title="twitter" rel='tooltip' data-placement='top' href="http://twitter.com/"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/twitter.png"></a></li>
	    <li class="footer-logo"><a title="footer-logo" rel='tooltip' data-placement='top' href="#header"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/logo.png"></a></li>
	  </ul>
	  </div>
	</div>
	
	</div>
      </div>
    
    
      </div>
    </div>


      <!--<div class="main-back" data-ride="animated" data-animation="fadeInUp" data-delay="300">
  <a href="#" class="btn-top back-to-top btn-dark pull-left"> <span class="glyphicon glyphicon-chevron-up"></span></a>
  </div>-->
    
     <!--=======footer close here=======-->
      <!--=======footer close here=======-->
    
   <!--script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery-1.9.1.min.js"></script> 
   <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/bootstrap.js"></script>   
  
   <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.animateNumbers.js"></script>
   <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.appear.js"></script>
   
   <!--===========Nicescroll jquery start here============-->
   <!--script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/core.js"></script>
   <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.nicescroll.min.js"></script>
    <!--===========Nicescroll jquery close here============-->
 
    
    <!--script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/back-to-top.js"></script>
    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/showup.js"></script>
    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/ie10-viewport-bug-workaround.js"></script>
  
<!-- Showup Plugin -->
<!--script>
      $().showUp('.navbar', {
        upClass: 'navbar-show',
        downClass: 'navbar-hide'
      });
</script-->
    
<!--script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script-->   
<!--script type="text/javascript" charset="utf-8">  
    $(document).ready(function() { 
        $('#myCarousel').oneCarousel({
            easeIn: 'rotateIn',
            interval: 5000,
            pause: 'hover'
        });
    });
</script--> 
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>    
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.mousewheel-3.0.4.pack.js"></script-->
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery("a[rel=example_group]").fancybox({
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'titlePosition'   : 'over',

    'titleFormat'   : function(title, currentArray, currentIndex, currentOpts) {
      return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
    }
  });

  jQuery(".navbar-toggle").click(function(){
    jQuery(".main-menu").toggleClass("in");
  });
  jQuery(".deeper.parent").click(function(){
    jQuery(".unstyled").toggleClass("show_sb_nav");
  });

});
</script> 
   
</body>
</html>
