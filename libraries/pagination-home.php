<?php
/**
 * CodexWorld is a programming blog. Our mission is to provide the best online resources on programming and web development.
 *
 * This Pagination class helps to integrate ajax pagination in PHP.
 *
 * @class		Pagination
 * @author		CodexWorld
 * @link		http://www.codexworld.com
 * @contact		http://www.codexworld.com/contact-us
 * @version		1.0
 */
class PaginationHomeBlog{
	var $baseURL		= '';
	var $totalRows  	= '';
	var $perPage	 	= 10;
	var $numLinks		=  2;
	var $currentPage	=  0;
	var $firstLink   	= '&lsaquo; First';
	var $nextLink		= 'Next <i class="fa fa-long-arrow-right"></i>';
	var $prevLink		= '<i class="fa fa-long-arrow-left"></i> Prev';
	var $lastLink		= 'Last &rsaquo;';
	var $fullTagOpen	= ' <ul class="pagination">';
	var $fullTagClose	= '</ul>';
	var $firstTagOpen	= '';
	var $firstTagClose	= ''; //-> Value &nbsp;
	var $lastTagOpen	= '';  //-> Value &nbsp;
	var $lastTagClose	= '';
	var $curTagOpen		= '<b>';
	var $curTagClose	= '</b>';
	var $nextTagOpen	= '';  //-> Value &nbsp;
	var $nextTagClose	= '';  //-> Value &nbsp;
	var $prevTagOpen	= '';  //-> Value &nbsp;
	var $prevTagClose	= '';
	var $numTagOpen		= '';  //-> Value &nbsp;
	var $numTagClose	= '';
	var $anchorClass	= '';
	var $showCount      = true;
	var $currentOffset	= 0;
	var $contentDiv     = '';
    var $additionalParam= '';
    
	function __construct($params = array()){
		if (count($params) > 0){
			$this->initialize($params);		
		}
		
		if ($this->anchorClass != ''){
			$this->anchorClass = 'class="'.$this->anchorClass.'" ';
		}	
	}
	
	function initialize($params = array()){
		if (count($params) > 0){
			foreach ($params as $key => $val){
				if (isset($this->$key)){
					$this->$key = $val;
				}
			}		
		}
	}
	
	/**
	 * Generate the pagination links
	 */	
	function createLinks(){ 
		// If total number of rows is zero, do not need to continue
		if ($this->totalRows == 0 OR $this->perPage == 0){
		   return '';
		}

		// Calculate the total number of pages
		$numPages = ceil($this->totalRows / $this->perPage);

		// Is there only one page? will not need to continue
		if ($numPages == 1){
			/*if ($this->showCount){
				$info = 'Showing : ' . $this->totalRows;
				return $info;
			}else{
				return '';
			}
            */
		}

		// Determine the current page	
		if ( ! is_numeric($this->currentPage)){
			$this->currentPage = 0;
		}
	
		// Links content string variable
		$output = '';
			/* 
		// Showing links notification
		if ($this->showCount){
		   $currentOffset = $this->currentPage;
		   $info = 'Showing ' . ( $currentOffset + 1 ) . ' to ' ;
		
		   if( ( $currentOffset + $this->perPage ) < ( $this->totalRows -1 ) )
			  $info .= $currentOffset + $this->perPage;
		   else
			  $info .= $this->totalRows;
		
		   $info .= ' of ' . $this->totalRows . ' | ';
		
		   $output .= $info;
		}
		*/
		$this->numLinks = (int)$this->numLinks;
		
		// Is the page number beyond the result range? the last page will show
		if ($this->currentPage > $this->totalRows){
			$this->currentPage = ($numPages - 1) * $this->perPage;
		}
		
		$uriPageNum = $this->currentPage;
		
		$this->currentPage = floor(($this->currentPage/$this->perPage) + 1);

		// Calculate the start and end numbers. 
		$start = (($this->currentPage - $this->numLinks) > 0) ? $this->currentPage - ($this->numLinks - 1) : 1;
		$end   = (($this->currentPage + $this->numLinks) < $numPages) ? $this->currentPage + $this->numLinks : $numPages;

		// Render the "First" link
		if  ($this->currentPage > $this->numLinks){
			//$output .= $this->firstTagOpen 
			//	. $this->getAJAXlink( '' , $this->firstLink)
			//	. $this->firstTagClose; 
		}

		// Render the "previous" link
		if  ($this->currentPage != 1){
			$i = $uriPageNum - $this->perPage;
			if ($i == 0) $i = '';
			$output .= $this->prevTagOpen 
				. $this->getAJAXlink( $i, $this->prevLink )
				. $this->prevTagClose;
		}

		// Write the digit links
		for ($loop = $start -1; $loop <= $end; $loop++){
			$i = ($loop * $this->perPage) - $this->perPage;
					
			if ($i >= 0){
				if ($this->currentPage == $loop){
					//$output .= $this->curTagOpen.$loop.$this->curTagClose;
                    $output .= '<li class="active"><a>'.$loop.'</a></li>';
				}else{
					$n = ($i == 0) ? '' : $i;
					$output .= $this->numTagOpen
						. $this->getAJAXlink( $n, $loop )
						. $this->numTagClose;
				}
			}
		}

		// Render the "next" link
		if ($this->currentPage < $numPages){
			$output .= $this->nextTagOpen 
				. $this->getAJAXlink( $this->currentPage * $this->perPage , $this->nextLink )
				. $this->nextTagClose;
		}

		// Render the "Last" link
		if (($this->currentPage + $this->numLinks) < $numPages){
			$i = (($numPages * $this->perPage) - $this->perPage);
		//	$output .= $this->lastTagOpen . $this->getAJAXlink( $i, $this->lastLink ) . $this->lastTagClose;
		}

		// Remove double slashes
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->fullTagOpen.$output.$this->fullTagClose;
		
		return $output;		
	}

	function getAJAXlink( $count, $text) {
        if( $this->contentDiv == '')
            return '<li><a href="'. $this->anchorClass . ' ' . $this->baseURL . $count . '">'. $text .'</a></li>';

        $pageCount = $count?$count:0;
        $this->additionalParam = "{'page' : $pageCount}";
		
	    return "<li><a href=\"javascript:void(0);\" " . $this->anchorClass . "
				onclick=\"$.post('". $this->baseURL."', ". $this->additionalParam .", function(data){
					   $('#". $this->contentDiv . "').html(data); }); return false;\">"
			   . $text .'</a></li>';
	}
}
?>