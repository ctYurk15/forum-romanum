<div class="pagination">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
</div>

@if (empty($hide_searсh) || (!empty($hide_searсh) && $hide_searсh != true))
<div class="search-bar">
    <input type="text" class="search-input" placeholder="Search...">
    <button class="search-button">Search</button>
</div>
@endif
