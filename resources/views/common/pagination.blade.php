@if($paginator->hasPages()) 
    <nav aria-label="Page navigation example">
        <ul class="pagination">
       
            <li class="page-item"><a class="page-link @if ($paginator->currentPage() == 1) invalid-page-number @endif " href="{{$paginator->previousPageUrl()}}">{{ trans('localization.previous')}}</a></li>
        
        @if ($paginator->lastPage() >=3 )
            @if ($paginator->currentPage() == 1)
                <li class="page-item"><a class="page-link invalid-page-number" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
            @elseif ( ($paginator->currentPage() == $paginator->lastPage()) && ($paginator->lastPage() >= 3) )
                <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage() - 2)}}">{{$paginator->currentPage() - 2}}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">{{$paginator->currentPage() - 1}}</a></li>
            @endif    

            @if ($paginator->currentPage() == 1)
                <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">{{$paginator->currentPage() + 1}}</a></li>
            @elseif ($paginator->currentPage() == $paginator->lastPage()) 
                <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">{{$paginator->currentPage() - 1}}</a></li>
            @else
                <li class="page-item"><a class="page-link invalid-page-number" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
            @endif
            
            @if ($paginator->currentPage() == 1)
                <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage() + 2)}}">{{$paginator->currentPage() + 2}}</a></li>
            @elseif ($paginator->currentPage() == $paginator->lastPage()) 
                <li class="page-item"><a class="page-link invalid-page-number" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">{{$paginator->currentPage() + 1}}</a></li>
            @endif  
        @else 
            @if ($paginator->currentPage() == 1)
                <li class="page-item"><a class="page-link invalid-page-number" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">{{$paginator->currentPage() - 1}}</a></li>
            @endif    

            @if ($paginator->currentPage() != 1)
                <li class="page-item"><a class="page-link invalid-page-number" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">{{$paginator->currentPage() + 1}}</a></li>
            @endif    
        @endif    
            <li class="page-item"><a class="page-link @if (!$paginator->hasMorePages()) invalid-page-number @endif " href="{{$paginator->nextPageUrl()}}">{{ trans('localization.next')}}</a></li>
    
        </ul>
    </nav>
@endif
