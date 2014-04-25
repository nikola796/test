<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8 no-js">      <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9 no-js">           <![endif]-->
<!--[if gt IE 9]>  <html class="no-js">                       <![endif]-->
<!--[if !IE]><!--> <html class="no-js">                       <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>ELITE - A Powerfull Responsive Admin Theme</title>
       
    <!-- // Mobile meta/files // -->


    
    <!-- // Internet Explore // -->
    
    <!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
    <meta name="application-name" content="Elite Admin Skin">
    <meta name="msapplication-tooltip" content="Cross-platform admin skin.">
    <meta name="msapplication-starturl" content="http://themes.creativemilk.net/elite/html/index.html">
    <!-- These custom tasks are examples, you need to edit them to show actual pages -->
    <meta name="msapplication-task" content="name=Home;action-uri=http://themes.creativemilk.net/elite/html/index.html;icon-uri=http://themes.creativemilk.net/elite/html/images/favicons/favicon.ico">
    <meta http-equiv="cleartype" content="on" /> 
    
    <!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
    <![endif]-->
            
    <!-- // Stylesheets // -->

    <!-- Framework -->
    <link rel="stylesheet" href="css/framework.css"/>
    <!-- Core -->
    <link rel="stylesheet" href="css/login.css"/>
    <!-- Styling -->
    <link rel="stylesheet" href="css/theme/darkblue.css" id="themesheet"/>
	<!--[if IE 7]>
	<link rel="stylesheet" href="css/destroy-ie6-ie7.css"/>
    <![endif]-->
      
    <!-- // Misc // -->
    
    <link rel="shortcut icon" href="images/favicons/favicon.ico">
    
    <!-- // jQuery/UI core // -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>!window.jQuery && document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
    <script src="http://code.jquery.com/ui/1.8.22/jquery-ui.min.js"></script>
    <script>!window.jQueryUI && document.write('<script src="js/jquery-ui-1.8.22.min.js"><\/script>')</script>
    
    <!-- // Plugins // -->    
                      
    <!-- Touch helper -->  
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <!-- Stylesheet switcher --> 
    <script src="js/e_styleswitcher.1.1.min.js"></script>   
    <!-- Checkbox solution -->
    <script src="js/e_checkbox.1.0.min.js"></script>       
    <!-- Tabs -->
    <script src="js/e_tabs.1.1.min.js"></script>
    <!-- Menu -->
    <script src="js/e_menu.1.1.min.js"></script>
    <!-- Contact form with validation -->
    <script src="js/e_contactform.1.1.min.js"></script>    
    <!-- Show password -->     
    <script src="js/e_showpassword.1.0.min.js"></script>  
    <!-- Tooltip -->               
    <script src="js/tipsy.js"></script>      
    <!-- Plugins and custom code -->     
    <script src="js/login.js"></script>  
    
    <!-- // HTML5/CSS3 support // -->

    <script src="js/modernizr.min.js"></script>
                
</head>
<body>  
 
    <!-- this part can be removed, its just here 
         to let you switch between styles and layout sizes -->
  
 
    <div id="login">
    
    	<!-- Put your logo here -->
    	<div id="logo">
        	<h1>ELITE</h1>
        </div>
        
        <!-- Show a dialog -->
       

        <!-- The main part -->                   
        <div id="login-outher">        
            <div id="login-inner">
                <header>
                    <h2>Login (validation)</h2> 
                    <ul class="e-splitmenu" id="login-lang">
                        <li><span>English</span><a href="javascript:void(0);"><img src="images/icons/flags/gb.png" alt=""/></a>
                        
                             <div>
                                <ul>
                                    <li><a href="index.html"><img src="images/icons/flags/gb.png" alt=""/> English</a></li>
                                    <li><a href="index.html"><img src="images/icons/flags/de.png" alt=""/> German</a></li>
                                    <li><a href="index.html"><img src="images/icons/flags/es.png" alt=""/> Spanish</a></li>
                                </ul>                                      
                            </div>                               

                        </li>
                    </ul>                                 
                </header>
                
                <div id="login-content">
                    <form method="post" action="index.html" id="login-form">
                        <div class="g_1">
                            <label for="field1">Username</label>
                        </div>
                        <div class="g_1">                            
                            <input type="text" name="" id="field1" tabindex="1" data-validation-type="present"/>
                        </div>
                        
                        <div class="spacer-10"><!-- spacer 20px --></div> 
                        
                        <div class="g_1">
                            <label for="field2">Password</label>
                            <a href="javascript:void(0);" class="forgot-password">Forgot password?</a>
                        </div>
                        <div class="g_1">  
                            <input type="password" name="" id="field2" tabindex="2" data-validation-type="present"/> 
                        </div>
                        
                        <div class="spacer-20"><!-- spacer 20px --></div> 
                        
                         <div class="g_1">
                            <input type="checkbox" name="" id="field3" tabindex="3"/>
                            <label for="field3">Remember me</label>
                            <input type="submit" value="Login" name="" tabindex="4" class="button-text"/>
                            <a href="javascript:void(0);" id="show-password" class="button-icon tip-n" title="Show Password" style="float:right"><span class="info-10 plix-10"></span></a>
                        </div>               
                    </form>
				</div><!-- End #login-content --> 
            </div><!-- End #login-inner -->                                  
        </div><!-- End #login-outher --> 
        
        <!-- place your copyright text here -->
        <footer id="footer">
        	Copyright © 2012 - Template by <a href="http://www.creativemilk.net">www.creativemilk.net</a>
        </footer> 
    </div><!-- End "#login" -->        
</body>
</html>