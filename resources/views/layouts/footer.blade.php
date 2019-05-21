  </div><!---wrapper ends-->
  <script src="{{ asset('assets/js/jquery-1.12.0.min.js') }}"/></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"/></script>
  <script src="{{ asset('assets/js/datatables/datatables.min.js') }}"/></script>

  <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      $('.side-menu').each(function(){
        $(this).siblings('.side-menu').children('.side-child-menu').hide();
      });
      $('.datatable').each(function(){
        $(this).DataTable();
      });
    })
    $(document).ready(function(){
      // $('.side-menu').off().on('click', function(e){
      $('a.main-link').off().on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $this = $(this);
        main_li = $this.closest('.side-menu');
        if(main_li.hasClass('menu-opened')){
          main_li.children('.side-child-menu').slideUp('fast');
          main_li.removeClass('menu-opened')
          return false;
        }else{
          main_li.siblings('.side-menu').children('.side-child-menu').hide();
          main_li.siblings('.side-menu').each(function(){
            $(this).children('.side-child-menu').hide();
            $(this).removeClass('menu-active');
            $(this).removeClass('menu-opened');
          });
          main_li.addClass('menu-active');
          main_li.addClass('menu-opened');
          main_li.children('.side-child-menu').slideDown('fast');
          return false;
        }
      })
    });
  </script>
</body>
</html>