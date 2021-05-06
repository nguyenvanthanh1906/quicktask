@if($paginator->hasPages()) 
    <nav aria-label="Page navigation example">
        <ul class="pagination">
       
            <li class="page-item"><a class="page-link" @if ($paginator->currentPage() == 1) style="pointer-events: none; color: grey" @endif href="{{$paginator->previousPageUrl()}}">{{ trans('i18n.previous')}}</a></li>

        @if ($paginator->currentPage() == 1)
            <li class="page-item"><a class="page-link" style="pointer-events: none; color: grey" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
        @elseif ($paginator->currentPage() == $paginator->lastPage())
            <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage() - 2)}}">{{$paginator->currentPage() - 2}}</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">{{$paginator->currentPage() - 1}}</a></li>
        @endif    

        @if ($paginator->currentPage() == 1)
            <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">{{$paginator->currentPage() + 1}}</a></li>
        @elseif ($paginator->currentPage() == $paginator->lastPage()) 
            <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">{{$paginator->currentPage() - 1}}</a></li>
        @else
            <li class="page-item"><a class="page-link" style="pointer-events: none; color: grey" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
        @endif
        
        @if ($paginator->currentPage() == 1)
            <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage() + 2)}}">{{$paginator->currentPage() + 2}}</a></li>
        @elseif ($paginator->currentPage() == $paginator->lastPage()) 
            <li class="page-item"><a class="page-link" style="pointer-events: none; color: grey" href="{{$paginator->url($paginator->currentPage())}}">{{$paginator->currentPage()}}</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">{{$paginator->currentPage() + 1}}</a></li>
        @endif  

            <li class="page-item"><a class="page-link" @if (!$paginator->hasMorePages()) style="pointer-events: none; color: grey" @endif href="{{$paginator->nextPageUrl()}}">{{ trans('i18n.next')}}</a></li>
    
        </ul>
    </nav>
@endif
