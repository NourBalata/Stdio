

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{asset('assets/img/navbar-logo.svg')}}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">{{__('SERVICES')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">{{__('PORTFOLIO')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">{{__('ABOUT')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">{{__('TEAM')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">{{__('CONTACT')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('dashbord')}}">{{__('DASHBORD')}}</a></li>
             
                <div class="row">
          
                    <div class="col-md-12">
                        <select class="form-control changeLang">
                            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
                            <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>AR</option>
                           
                        </select>
                    </div>
                </div>
            </ul>
        </div>
    </div>
  
</div>

</nav>

