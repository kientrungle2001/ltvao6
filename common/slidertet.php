<div class="full slide">
  <div id="homeslider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div rel="#6dccfd" class="carousel-item relative active">
        <img class="d-block w-100" src="/assets/images/slider1.jpg" alt="First slide">
        <div class="absolute language d-none">
          <div class="d-flex bd-highlight">
  
            <span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('en');">Tiếng Anh<br><img src="/assets/images/en.png"> </span>
            <span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('vn')">Tiếng Việt<br><img src="/assets/images/vn.png"></span>
            <span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('ev')">Song ngữ <br><img src="/assets/images/ev.png"> </span>
          </div>

        </div>
        <div class="absolute language-xs d-none">
          <div class="d-flex bd-highlight">
  
            <span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage();">Tiếng Anh<br><img src="/assets/images/en.png"> </span>
            <span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('vn')">Tiếng Việt<br><img src="/assets/images/vn.png"></span>
            <span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('ev')">Song ngữ <br><img src="/assets/images/ev.png"> </span>
          </div>

        </div>
        <div class="absolute timhieu d-none d-sm-block"><a class="btn btn-warning" href="/about.php">Tìm hiểu ngay</a>
        </div>
        <div class="absolute timhieu2 d-block d-sm-none"><a class="btn-xs btn-warning" href="/about.php">Tìm hiểu ngay</a>
        </div>
      </div>
      <div rel="#fcb7d5" class="carousel-item">
        <img class="d-block w-100" src="/assets/images/slider2.jpg" alt="Second slide">
        <div class="absolute btdk d-none d-sm-block"><a class="btn btn-warning" href="/about.php#guide">Đăng kí ngay</a>
        </div>
        <div class="absolute btdk2 d-block d-sm-none"><a class="btn-xs btn-warning" href="/about.php#guide">Đăng kí ngay</a>
        </div>
      </div>
      <div rel="#7bc646" class="carousel-item">
        <img class="d-block w-100" src="/assets/images/slider3.jpg" alt="Third slide">
      </div>
       
    <a class="carousel-control-prev" href="#homeslider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#homeslider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<?php if(0):?>
<script type="text/javascript">
 
  var clearId = setInterval(function(){
    if(typeof jQuery != 'undefined'){
        var color = jQuery('#homeslider').find('.active').attr('rel');
    
        jQuery('.header').css('background', color);
    }
  }, 100);

 
</script>
<?php endif;?>