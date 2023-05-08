<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg order-lg-first">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
              <a href="{{ route('user.articles') }}" class="nav-link"><i class="fe fe-home"></i> Liste de mes articles</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('articles.create') }}" class="nav-link"><i class="fa fa-pencil-square-o"></i> Nouvel article</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('deconnect') }}" class="nav-link"><i class="fe fe-power"></i>Se déconnecter</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>