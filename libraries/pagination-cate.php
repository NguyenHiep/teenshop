<?php
class PaginationHome{
	
	private $totalItems;					// Tổng số phần tử
	private $totalItemsPerPage		= 3;	// Tổng số phần tử xuất hiện trên một trang
	private $pageRange				= 2;	// Số trang xuất hiện
	private $totalPage;						// Tổng số trang
	private $currentPage			= 1;	// Trang hiện tại
	
	public function __construct($totalItems, $totalItemsPerPage = 1, $pageRange = 3, $currentPage = 1){
		$this->totalItems			= $totalItems;
		$this->totalItemsPerPage	= $totalItemsPerPage;
		
		if($pageRange %2 == 0) $pageRange = $pageRange + 1;
		
		$this->pageRange			= $pageRange;
		$this->currentPage			= $currentPage;
		$this->totalPage			= ceil($totalItems/$totalItemsPerPage);
	}
	
	public function showPagination($link){
      
		// Pagination
		$paginationHTML = '';
		if($this->totalPage > 1){
			$start 	= '<li><a rel="nofollow">Start </a></li>';
			$prev 	= '<li class="disabled"><a rel="nofollow">← Pre</a></li>';
			if($this->currentPage > 1){
				$start 	= '<li><a href="?page=1">Start</a></li>';
				$prev 	= '<li><a href="'.BASE_URL.$link.'.html?page='.($this->currentPage - 1).'">← Pre</a></li>';
			}
		
			$next 	= '<li  class="disabled"><a rel="nofollow"> Next → </a> </li>';
			$end 	= '<li><a rel="nofollow"> End</li>';
			if($this->currentPage < $this->totalPage){
				$next 	= '<li><a href="'.BASE_URL.$link.'.html?page='.($this->currentPage + 1).'">Next →</a></li>';
				$end 	= '<li><a href="?page'.$this->totalPage.'">End</a></li>';
			}
		
			if($this->pageRange < $this->totalPage){
				if($this->currentPage == 1){
					$startPage 	= 1;
					$endPage 	= $this->pageRange;
				}else if($this->currentPage == $this->totalPage){
					$startPage		= $this->totalPage - $this->pageRange + 1;
					$endPage		= $this->totalPage;
				}else{
					$startPage		= $this->currentPage - ($this->pageRange-1)/2;
					$endPage		= $this->currentPage + ($this->pageRange-1)/2;
		
					if($startPage < 1){
						$endPage	= $endPage + 1;
						$startPage = 1;
					}
		
					if($endPage > $this->totalPage){
						$endPage	= $this->totalPage;
						$startPage 	= $endPage - $this->pageRange + 1;
					}
				}
			}else{
				$startPage		= 1;
				$endPage		= $this->totalPage;
			}
            $listPages = '';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->currentPage) {
					$listPages .= '<li class="active"><a rel="nofollow">'.$i.'</a>';
				}else{
					$listPages .= '<li><a href="'.BASE_URL.$link.'.html?page='.$i.'">'.$i.'</a>';
				}
			}
		
		//	$paginationHTML = '<ul class="pagination pagination-lg">' . $start . $prev . $listPages . $next . $end . '</ul>';
        $paginationHTML = '<ul class="pagination margin-top-5">'  . $prev. $listPages . $next . '</ul>';
		}
		return $paginationHTML;
	}
    
    	public function showPaginationSearch($link){
      
		// Pagination
		$paginationHTML = '';
		if($this->totalPage > 1){
			$start 	= '<li><a rel="nofollow">Start </a></li>';
			$prev 	= '<li class="disabled"><a rel="nofollow"><i class="fa fa-long-arrow-left"></i> Prev</a></li>';
			if($this->currentPage > 1){
				$start 	= '<li><a href="?page=1">Start</a></li>';
				$prev 	= '<li><a href="'.$link.'&page='.($this->currentPage-1).'"><i class="fa fa-long-arrow-left"></i> Prev</a></li>';
			}
		
			$next 	= '<li  class="disabled"><a rel="nofollow">Next <i class="fa fa-long-arrow-right"></i></a> </li>';
			$end 	= '<li><a rel="nofollow"> End</li>';
			if($this->currentPage < $this->totalPage){
				$next 	= '<li><a href="'.$link.'&page='.($this->currentPage+1).'">Next <i class="fa fa-long-arrow-right"></i></a></li>';
				$end 	= '<li><a href="?page'.$this->totalPage.'">End</a></li>';
			}
		
			if($this->pageRange < $this->totalPage){
				if($this->currentPage == 1){
					$startPage 	= 1;
					$endPage 	= $this->pageRange;
				}else if($this->currentPage == $this->totalPage){
					$startPage		= $this->totalPage - $this->pageRange + 1;
					$endPage		= $this->totalPage;
				}else{
					$startPage		= $this->currentPage - ($this->pageRange-1)/2;
					$endPage		= $this->currentPage + ($this->pageRange-1)/2;
		
					if($startPage < 1){
						$endPage	= $endPage + 1;
						$startPage = 1;
					}
		
					if($endPage > $this->totalPage){
						$endPage	= $this->totalPage;
						$startPage 	= $endPage - $this->pageRange + 1;
					}
				}
			}else{
				$startPage		= 1;
				$endPage		= $this->totalPage;
			}
            $listPages = '';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->currentPage) {
					$listPages .= '<li class="active"><a rel="nofollow">'.$i.'</a>';
				}else{
					$listPages .= '<li><a href="'.$link.'&page='.$i.'">'.$i.'</a>';
				}
			}
		
		//	$paginationHTML = '<ul class="pagination pagination-lg">' . $start . $prev . $listPages . $next . $end . '</ul>';
        $paginationHTML = '<ul class="pull-right pagination margin-top-5">'  . $prev. $listPages . $next . '</ul>';
		}
		return $paginationHTML;
	}
    
}