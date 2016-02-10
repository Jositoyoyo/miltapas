<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppBannerController extends Controller
{
    public function indexAction(Request $request)
    {	
    	$regex = '/(android|wap|phone|ipad)/i';
    	$HTTP_USER_AGENT = $request->server->get('HTTP_USER_AGENT');
    	if($request->cookies->get('appBanner') != 'false'){
			if(!preg_match($regex,strtolower($HTTP_USER_AGENT))){
	    		$html = '<div id="app_banner">
	    					Descargate la app y navega mas rapido !!
	    					<a id="csl_appBanner">Cerrar</a>
	    				</div>';
	 		}
    	}
 		$html .= $this->script();
        return new Response($html);
    }
    public function script(){
    	return '<script>
    			$("#csl_appBanner").click(function(){
    				$("#app_banner").fadeout();
    				document.cookie="appBanner=false"; 
    			});
					   			
    			</script>';
    }
    public function isclosed(){
    	
    }
}
