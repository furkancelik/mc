  <div class="mainbar">

  <div class="container">

    <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
      <i class="fa fa-bars"></i>
    </button>

    <div class="mainbar-collapse collapse">

      <ul class="nav navbar-nav mainbar-nav">

        <li class="dropdown{{ (Route::currentRouteName()=='admin.dashboard')?' active':'' }}">
          <a href="{{ URL::route('admin.dashboard') }}">
            <i class="fa fa-dashboard"></i>
            Yönetim Paneli
          </a>
        </li>

        <li class="dropdown{{ (
		(Route::currentRouteName()=='admin.lesson.index') ||
		(Route::currentRouteName()=='admin.lesson.create') ||
		(Route::currentRouteName()=='admin.lesson.show') ||
		
		(Route::currentRouteName()=='admin.classes.index') ||
		(Route::currentRouteName()=='admin.classes.create') ||
		(Route::currentRouteName()=='admin.classes.show') ||
		
		(Route::currentRouteName()=='admin.notes.index') ||
		(Route::currentRouteName()=='admin.notes.create') ||
		(Route::currentRouteName()=='admin.notes.show') ||
		
		(Route::currentRouteName()=='admin.users') ||
		(Route::currentRouteName()=='admin.admin.users.show') ||
		(Route::currentRouteName()=='admin.admin.users.edit') ||
		(Route::currentRouteName()=='admin.admin.users.delete')
		)?' active':'' }}">
          <a href="#okulbilgileri" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
            <i class="fa fa-users"></i>
            Okul Bilgileri
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">   
            <li><a href="{{ URL::route('admin.lesson.index') }}">Dersler</a></li>
            <li><a href="{{ URL::route('admin.classes.index') }}">Sınıflar</a></li>
            <li><a href="{{ URL::route('admin.notes.index') }}">Notlar</a></li>
            <li><a href="{{ URL::route('admin.users') }}">Üyeler</a></li>
          </ul>
        </li>

        <li class="dropdown{{ (
		(Route::currentRouteName()=='admin.categories.index') ||
		(Route::currentRouteName()=='admin.categories.create') ||
		(Route::currentRouteName()=='admin.categories.show') ||
		
		(Route::currentRouteName()=='admin.contents.index') ||
		(Route::currentRouteName()=='admin.contents.create') ||
		(Route::currentRouteName()=='admin.contents.show')
		)?' active':'' }}">
          <a href="#icerikler" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class="fa fa-book"></i> 
          Ders İçerikler
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('admin.categories.index') }}">Kategoriler</a></li>
            <li><a href="{{ URL::route('admin.contents.index') }}">İçerikler</a></li>
          </ul>
        </li>
		
		
		<li class="dropdown{{ (
		(Route::currentRouteName()=='admin.menu.index') ||
		(Route::currentRouteName()=='admin.menu.create') ||
		(Route::currentRouteName()=='admin.menu.show') ||
		
		(Route::currentRouteName()=='admin.article.index') ||
		(Route::currentRouteName()=='admin.article.create') ||
		(Route::currentRouteName()=='admin.article.show')
		)?' active':'' }}">
          <a href="#icerikler" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class="fa fa-files-o"></i> 
          Sayfalar
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('admin.menu.index') }}">Menüler</a></li>
            <li><a href="{{ URL::route('admin.article.index') }}">Makaleler</a></li>
          </ul>
        </li>

        <li class="dropdown{{ (
		(Route::currentRouteName()=='admin.worked.index')
		)?' active':'' }}">
          <a href="{{ URL::route('admin.worked.index') }}" class="dropdown-toggle">
            <i class="fa fa-pencil-square-o"></i>
            Çalışılan Dersler
          </a>
        </li>  
		
		<li class="dropdown{{ (
		(Route::currentRouteName()=='admin.calendar.index') ||
		(Route::currentRouteName()=='admin.calendar.create') ||
		(Route::currentRouteName()=='admin.calendar.show')
		)?' active':'' }}">
          <a href="{{ URL::route('admin.calendar.index') }}" class="dropdown-toggle">
            <i class="fa fa-calendar"></i>
            Etkinlikler
          </a>
        </li>  

        <li class="dropdown{{ (
		(Route::currentRouteName()=='admin.post.index') ||
		(Route::currentRouteName()=='admin.post.create') ||
		(Route::currentRouteName()=='admin.post.show')
		)?' active':'' }}">
          <a href="{{ URL::route('admin.post.index') }}" class="dropdown-toggle">
            <i class="fa fa-comments"></i>
            Mesajlar
          </a>
		</li>
		
		<li class="dropdown">
          <a href="{{ URL::route('logout') }}" class="dropdown-toggle">
            <i class="fa fa-power-off"></i>
            Çıkış Yap
          </a>
        </li>

      </ul>

    </div> <!-- /.navbar-collapse -->   

  </div> <!-- /.container --> 

</div> <!-- /.mainbar -->

