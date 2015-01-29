<footer class="footer">

  <div class="container">

    <div class="row">

      <div class="col-sm-1-md">

   <!--     <h4>Tema Hakkında</h4> -->

        <br>

        <p>Web Tasarım ve Programlama <a target="_blank" href="http://www.swbilisim.com">SW Bilişim</a> Tarafından Yapılmıştır.</p>  

        <hr>    

        <p>Bu Bir <a target="_blank" href="http://www.swbilisim.com">SW Bilişim</a> Ürünüdür &copy; 2014 Tüm Hakkı Saklıdır. </p>

      </div> <!-- /.col -->
	</div><!-- /.row -->
  </div> <!-- /.container -->
  
</footer>
	{{ HTML::script('assets/backend/js/libs/jquery-1.10.1.min.js') }}
	{{ HTML::script('assets/backend/js/libs/jquery-ui-1.9.2.custom.min.js') }}
	{{ HTML::script('assets/backend/js/libs/bootstrap.min.js') }}
	
  <!--[if lt IE 9]>
  {{ HTML::script('assets/backend/js/libs/excanvas.compiled.js') }}
  <![endif]-->
  
  @yield('footer')
  
  <!-- App JS -->
  {{ HTML::script('assets/backend/js/target-admin.js') }}
 