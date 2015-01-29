  <div class="navbar">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-cogs"></i>
      </button>

      <a class="navbar-brand navbar-brand-image" href="{{ URL::route('admin.dashboard') }}">
        <img src="img/logo.png" alt="Site Logo">
      </a>

    </div> <!-- /.navbar-header -->

    <div class="navbar-collapse collapse">

      

      <ul class="nav navbar-nav noticebar navbar-left">
<!--
        <li class="dropdown">
          <a href="page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="navbar-visible-collapsed">&nbsp;Notifications&nbsp;</span>
            <span class="badge">3</span>
          </a>

          <ul class="dropdown-menu noticebar-menu" role="menu">
            <li class="nav-header">
              <div class="pull-left">
                Notifications
              </div>

              <div class="pull-right">
                <a href="javascript:;">Mark as Read</a>
              </div>
            </li>

            <li>
              <a href="page-notifications.html" class="noticebar-item">
                <span class="noticebar-item-image">
                  <i class="fa fa-cloud-upload text-success"></i>
                </span>
                <span class="noticebar-item-body">
                  <strong class="noticebar-item-title">Templates Synced</strong>
                  <span class="noticebar-item-text">20 Templates have been synced to the Mashon Demo instance.</span>
                  <span class="noticebar-item-time"><i class="fa fa-clock-o"></i> 12 minutes ago</span>
                </span>
              </a>
            </li>

            <li>
              <a href="page-notifications.html" class="noticebar-item">
                <span class="noticebar-item-image">
                  <i class="fa fa-ban text-danger"></i>
                </span>
                <span class="noticebar-item-body">
                  <strong class="noticebar-item-title">Sync Error</strong>
                  <span class="noticebar-item-text">5 Designs have been failed to be synced to the Mashon Demo instance.</span>
                  <span class="noticebar-item-time"><i class="fa fa-clock-o"></i> 20 minutes ago</span>
                </span>
              </a>
            </li>

            <li class="noticebar-menu-view-all">
              <a href="page-notifications.html">View All Notifications</a>
            </li>
          </ul>
        </li>

-->
        <li class="dropdown">
          <a href="{{ URL::route('admin.post.index') }}" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
            <span class="navbar-visible-collapsed">&nbsp;Messages&nbsp;</span>
			@if ($PostCount>0)
			<span class="badge">{{ $PostCount }}</span>
			@endif
          </a>
		<!-- @if ($PostCount>0)-->
          <ul class="dropdown-menu noticebar-menu" role="menu">                
            <li class="nav-header">
              <div class="pull-left">
                Gelen Mesajlar
              </div>

              <div class="pull-right">
                <a href="{{ URL::route('admin.post.create') }}">Yeni Mesaj</a>
              </div>
            </li>
			@if (count($PostGets)>0)
			@foreach($PostGets as $PostGet) 
		    <li>
              <a href="{{ URL::route('admin.post.show',$PostGet->id) }}" class="noticebar-item">                
                <span class="noticebar-item-body">
                  <strong class="noticebar-item-title">{{ $PostGet->subject }}</strong>
                  <span class="noticebar-item-text">
					  @if (strlen($PostGet->message>56))
						{{ substr($PostGet->message,0,56) }}...
					  @else
						{{ $PostGet->message }}
					  @endif
				  </span>
                  <!--<span class="noticebar-item-time"><i class="fa fa-clock-o"></i> 20 minutes ago</span>-->
                </span>
              </a>
            </li>
			@endforeach
					
            <li class="noticebar-menu-view-all">
              <a href="{{ URL::route('admin.post.index') }}">Tüm Mesajlar</a>
            </li>
			@else
			<li class="noticebar-empty">                  
              <h4 class="noticebar-empty-title">No alerts here.</h4>
              <p class="noticebar-empty-text">Check out what other makers are doing on Explore!</p>                
            </li>
			@endif
          </ul>
        
		<!--@endif -->
		
		</li>

<!--
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-exclamation-triangle"></i>
            <span class="navbar-visible-collapsed">&nbsp;Alerts&nbsp;</span>
          </a>

          <ul class="dropdown-menu noticebar-menu noticebar-hoverable" role="menu">                
            <li class="nav-header">
              <div class="pull-left">
                Alerts
              </div>
            </li>

            <li class="noticebar-empty">                  
              <h4 class="noticebar-empty-title">No alerts here.</h4>
              <p class="noticebar-empty-text">Check out what other makers are doing on Explore!</p>                
            </li>
          </ul>
        </li>
-->
      </ul>

      <ul class="nav navbar-nav navbar-right">   

       <!-- <li>
          <a href="javascript:;">About</a>
        </li>    
          
        <li>
          <a href="javascript:;">Resources</a>
        </li>    
-->
        <li class="dropdown navbar-profile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
            <img src="img/avatars/avatar-none.jpg" class="navbar-profile-avatar" alt="">
            <span class="navbar-profile-label">{{ $UserMail }} &nbsp;</span>
            <i class="fa fa-caret-down"></i>
          </a>

          <ul class="dropdown-menu" role="menu">

            <li>
              <a href="{{ URL::route('admin.users.show',Auth::user()->id)}}">
                <i class="fa fa-user"></i> 
                &nbsp;&nbsp;Profilim
              </a>
            </li>

            <li class="divider"></li>

            <li>
              <a href="{{ URL::route('logout') }}">
                <i class="fa fa-sign-out"></i> 
                &nbsp;&nbsp;Çıkış Yap
              </a>
            </li>

          </ul>

        </li>

      </ul>

       



       

    </div> <!--/.navbar-collapse -->

  </div> <!-- /.container -->

</div> <!-- /.navbar -->

