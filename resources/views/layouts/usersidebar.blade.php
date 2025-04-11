@php
$data=$data??[];

@endphp

<aside class="sidebar" id="sidebar">
    <form  action="/show" method="get">
    @csrf
    
    <h5>Search Firms</h5>
    <div class="mb-3">
    <input type="search" id="search" name="keyword" class="form-control" placeholder="Search...">
    </div>
    {{-- <h6 class="mt-3">Filters</h6>
    <select class="form-select mt-2">
        <option>All Categories</option>
        <option>Healthcare</option>
        <option>Legal</option>
        <option>Finance</option>
    </select> --}}
    <div class="text-center" >
        <button class="btn btn-warning text-center">searech</button>
    </div>
</form>
</aside>

<button class="toggle-indicator" id="toggleSidebar">Close</button>
