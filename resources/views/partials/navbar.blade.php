<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0" method="get" action="{{ route('articles.index') }}">
                    <input type="search" class="form-control header-search" name="keyword" placeholder="Search&hellip;" tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>
            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                        <a href="{{ route('articles.index') }}" class="nav-link"><i class="fe fe-home"></i> Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
