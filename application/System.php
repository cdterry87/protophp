<?php

class System{
	
	private $_view_data=array();
	
	/* --------------------------------------------------------------------------------
	 * Run the application by determining the route based on the URL
	 * -------------------------------------------------------------------------------- */
	public function run(){
	//Get the specified route from the URL (or the default configuration)
		$route=DEFAULT_ROUTE;
		if(isset($_GET['_page'])){
			$route=$_GET['_page'];
		}
		$route=rtrim($route,'/');
		
		//Set the full path to the route
		$route_path=$_SERVER['DOCUMENT_ROOT'].'/'.BASE_URL.'/application/routes/'.$route.'.php';
		$route_path=str_replace('//', '/', $route_path);
		
		//Check if the route path is valid and load the specified route
		if(file_exists($route_path)){
			//Exact route found
			$valid_route_path=$route_path;
		}else{
			//Exact route NOT found so find the next best match
			$valid_route_path="";
			
			$route_path_array=explode('/',$route_path);
			$route_path="";
            foreach($route_path_array as $index=>$segment){
				//Build route path one segment at a time to check if the file exists
				$route_path.=$segment.'/';
				$route_path_check=substr($route_path,0,-1).'.php';
				
				//Save each valid path; the last valid path will be the path that is loaded
                if(file_exists($route_path_check)){
                    $valid_route_path=$route_path_check;
                }
            }
		}
		
		//Load the specified route
		if(trim($valid_route_path)!='' and file_exists($valid_route_path)){
			return require_once($valid_route_path);
		}
		
		return false;
	}
		
	/* --------------------------------------------------------------------------------
	 * Load the specified view
	 * -------------------------------------------------------------------------------- */
	public function view($file, $data=''){
		//Set the full view path
		$view_path=$_SERVER['DOCUMENT_ROOT'].'/'.BASE_URL.'/application/views/'.$file.'.php';
		$view_path=str_replace('//', '/', $view_path);
		
		//Check to see if the page exists
		if(file_exists($view_path)){
			//If data is set, load the data into the view data variable for screen parsing
			if(!empty($data) and is_array($data)){
				$this->_view_data=array_merge($data, $this->_view_data);
			}
			//If view data is set, extract the array elements into individual variables
			if(!empty($this->_view_data) and is_array($this->_view_data)){
				extract($this->_view_data);
			}
			
			//Load the view file into the output buffer
			ob_start();
			include($view_path);
			$view=ob_get_contents();
			
			//Print the page to the browser window
			ob_end_clean();
			
			return print($view);
		}
		
		return false;
	}
		
	/* --------------------------------------------------------------------------------
	 * Create an anchor tag
	 * -------------------------------------------------------------------------------- */
	function anchor($path='', $name='', $attributes=''){
		return '<a href="'.BASE_URL.$path.'" '.$attributes.'>'.$name.'</a>';
	}
	
	/* --------------------------------------------------------------------------------
	 * Redirect to the specified location
	 * -------------------------------------------------------------------------------- */
	public function redirect($path){
		header('location: '.BASE_URL.$path, true);
		exit;
	}
	
}