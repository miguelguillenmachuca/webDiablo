@php
// config
$link_limit = 5; // número máximo de enlaces
@endphp

@if ($paginator->lastPage() > 1)
  <ul class="pagination pagination-redondo">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
      <a href="{{ $paginator->url(1) }}">&laquo;&laquo;</a>
    </li>

    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
      <a href="{{ $paginator->url($paginator->currentPage()-1) }}">&laquo;</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
      <?php
      $half_total_links = floor($link_limit / 2);
      $from = $paginator->currentPage() - $half_total_links;
      $to = $paginator->currentPage() + $half_total_links;
      if ($paginator->currentPage() < $half_total_links) {
        $to += $half_total_links - $paginator->currentPage();
      }
      if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
      }
      ?>
      @if ($from < $i && $i < $to)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
          <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
      @endif
    @endfor
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
      <a href="{{ $paginator->url($paginator->currentPage()+1) }}">&raquo;</a>
    </li>
    
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
      <a href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;&raquo;</a>
    </li>
  </ul>
@endif
