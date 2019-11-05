<?php

namespace Models;
use Resources;

class Slide extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
	
	public function get()
    {
        $query = '$data = $this->db->select()->from($this->config[\'prefix\'].\'slide\')';
		$query .= '->getAll();';
		
		eval($query);
        
        $return = array();
            
        foreach ($data as $key => $val)
        {
            //~ echo '<pre>';print_r($val);echo '</pre>';die();
            if($key % 2 == 0)
            $return[] = $this->leftHand($val);
            else
            $return[] = $this->rightHand($val);
            
        }
		return $return;
    }
    
	public function leftHand($data)
    {
        return '
                        <!-- MAIN IMAGE -->
						<img src="'.SITE.'img/slider/slide-back.jpg"  alt="" data-duration="2000" />	
						<!-- LAYER NR. 1 -->
						<div class="tp-caption customin customout large_bold_white"
							data-x="right" data-hoffset="-50"
							data-y="100"
							data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="1000"
							data-start="1200"
							data-easing="Back.easeInOut"
							data-endspeed="300"
							style="z-index: 1">'.$data->title.'
						</div>
						<!-- LAYER NR. 2 -->
						<div class="tp-caption medium_light_white customin customout text-right"
							data-x="right" data-hoffset="-50"
							data-y="175"
							data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="1000"
							data-start="2800"
							data-easing="Power4.easeOut"
							data-endspeed="500"
							data-endeasing="Power4.easeIn"
							data-captionhidden="on"
							style="z-index: 3">'.$data->description.'
						</div>
						<!-- LAYER NR. 3 -->
						<div class="tp-caption customin customout"
							data-x="right" data-hoffset="-50"
							data-y="285"
							data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="800"
							data-start="3400"
							data-easing="Power4.easeOut"
							data-endspeed="500"
							data-endeasing="Power4.easeIn"
							data-captionhidden="on"
							style="z-index: 4"><a class="btn btn-danger" href="'.$data->url.'">'.$data->urlword.'</a>
						</div>
						<!-- LAYER NR. 4 -->
						<div class="tp-caption lfl customout"
							data-x="100"
							data-y="90"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="1000"
							data-start="3800"
							data-easing="Power4.easeOut"
							data-endspeed="300"
							data-endeasing="Power1.easeIn"
							data-captionhidden="on"
							style="z-index: 5"><img class="img-responsive" style="width:450px;height:300px" src="'.$data->image.'" alt="" />
						</div>        
        ';
    }
	public function rightHand($data)
    {
        return '
						<!-- MAIN IMAGE -->
						<img src="'.SITE.'img/slider/slide-back.jpg"  alt="" data-duration="2000" />	
						<!-- LAYER NR. 1 -->
						<div class="tp-caption customin customout large_bold_white"
							data-x="50"
							data-y="100"
							data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="1000"
							data-start="1200"
							data-easing="Back.easeInOut"
							data-endspeed="300"
							style="z-index: 1">'.$data->title.'
						</div>
						<!-- LAYER NR. 2 -->
						<div class="tp-caption medium_light_white customin customout"
							data-x="50"
							data-y="175"
							data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="1000"
							data-start="2800"
							data-easing="Power4.easeOut"
							data-endspeed="500"
							data-endeasing="Power4.easeIn"
							data-captionhidden="on"
							style="z-index: 3">'.$data->description.'
						</div>
						<!-- LAYER NR. 3 -->
						<div class="tp-caption customin customout"
							data-x="50"
							data-y="285"
							data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="800"
							data-start="3400"
							data-easing="Power4.easeOut"
							data-endspeed="500"
							data-endeasing="Power4.easeIn"
							data-captionhidden="on"
							style="z-index: 4"><a class="btn btn-info" href="'.$data->url.'">'.$data->urlword.'</a>
						</div>
                        <div class="tp-caption lfl"
							data-x="right" data-hoffset="-50"
							data-y="90"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="1000"
							data-start="3800"
							data-easing="Power4.easeOut"
							data-endspeed="300"
							data-endeasing="Power1.easeIn"
							data-captionhidden="on"
							style="z-index: 1"><img class="img-responsive" style="width:450px;height:300px" src="'.$data->image.'" alt="" />
						</div>
						<!-- LAYER NR. 4 -->        
        ';
    }
}
