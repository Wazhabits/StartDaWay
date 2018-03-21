<aside class="row">
    <nav id="amenu" class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 cl-effect-3">
          <div class="col-2">
              <a class="menu-collapse col-12 " href="/">
                    <i class="fas fa-home"></i> <span>Home</span>
              </a>
          </div>
          <div class="col-2">
              <a class="menu-collapse col-12" data-toggle="collapse" href="#menu-user">
                    <i class="far fa-user"></i> <span>Membre</span>
              </a>
          </div>
          <div class="col-2">
                <a href="/jobs/" class="menu-collapse col-12">
                <i class="fas fa-suitcase"></i> <span>Jobs</span>
                </a>
          </div>
          @if(Session::has('user'))
          <div class="col-2 ">
              <a class="menu-collapse col-12" data-toggle="collapse" href="#menu-start">
                  <i class="far fa-building"></i> <span>Start-Up</span>
              </a>
          </div>
          <div class="col-1"></div>
          <div class="col-3">
              <a href="/member/disconnect" class="menu-collapse col-12">
                    <i class="fas fa-power-off"></i> <span>Déconnexion</span>
              </a>
          </div>
          @endif
    </nav>
</aside>