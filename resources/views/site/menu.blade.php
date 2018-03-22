<aside class="row">
    <nav id="amenu" class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="col-2">
              <a class="menu-link col-12 center" href="/">
                    <i class="fas fa-home"></i>
              </a>
          </div>
          <div class="col-2">
              <a class="menu-link menu-collapse col-12" data-toggle="collapse" href="#menu-user">
                    <i class="far fa-user"></i> <span>Membres</span>
              </a>
          </div>
          <div class="col-2">
                <a href="/jobs/" class="menu-link menu-collapse col-12">
                    <i class="fas fa-suitcase"></i> <span>Jobs</span>
                </a>
          </div>
          @if(Session::has('user'))
          <div class="col-2 ">
              <a class="menu-link menu-collapse col-12" data-toggle="collapse" href="#menu-start">
                  <i class="far fa-building"></i> <span>Start-Up</span>
              </a>
          </div>
          <div class="col-2"></div>
          <div class="col-2">
              <a class="menu-link menu-disconnect col-12 center" href="/member/disconnect" >
                    <i class="fas fa-power-off"></i>
              </a>
          </div>
          @endif
    </nav>
</aside>