
         <!-- Footer, thông tin, chính sách -->
         <div class="footer">
            <script src="Public/frontend/app/services/moduleServices.js"></script>
            <script src="Public/frontend/app/controllers/moduleController.js"></script>
            <footer class="footer-content">
               <div class="footer_top">
                  <div class="container">
                     <div class="footer_top_wrap">
                        <div class="row">
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- footer col 1 -->
                              <div class="footer_block">
                                 <h4 class="footer_block_title">
                                    Về ch&#250;ng t&#244;i
                                 </h4>
                                 <div class="block_content">
                                    <ul class="list_group">
                                       <li class="item">
                                          <a href="gioi-thieu.php">
                                          Giới thiệu
                                          </a>
                                       </li>
                                       <li class="item">
                                          <a href="Public/frontend/content/giao-hang-doi-tra.php">
                                          Giao h&#224;ng - Đổi trả
                                          </a>
                                       </li>
                                       <li class="item">
                                          <a href="Public/frontend/content/chinh-sach-bao-mat.php">
                                          Ch&#237;nh s&#225;ch bảo mật
                                          </a>
                                       </li>
                                       <li class="item">
                                          <a href="lien-he.php">
                                          Li&#234;n hệ
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <!-- End footer col 1 -->
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- footer col 1 -->
                              <div class="footer_block">
                                 <h4 class="footer_block_title">
                                    Trợ gi&#250;p
                                 </h4>
                                 <div class="block_content">
                                    <ul class="list_group">
                                       <li class="item">
                                          <a href="Public/frontend/content/huong-dan-mua-hang.php">
                                          Hướng dẫn mua h&#224;ng
                                          </a>
                                       </li>
                                       <li class="item">
                                          <a href="Public/frontend/content/huong-dan-thanh-toan.php">
                                          Hướng dẫn thanh to&#225;n
                                          </a>
                                       </li>
                                       <li class="item">
                                          <a href="Public/frontend/content/tai-khoan-giao-dich.php">
                                          T&#224;i khoản giao dịch
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <!-- End footer col 1 -->
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- footer col 3 -->
                              <div class="footer_block">
                                 <h4 class="footer_block_title">
                                    Đăng ký nhận bản tin
                                 </h4>
                                 <div class="block_content" ng-controller="moduleController" ng-init="initController()">
                                    <div class="des_newsletter_form">
                                       Đăng Ký Thành Viên Để Nhận Bản Tin Mỗi Ngày:
                                    </div>
                                    <form id="newsletter_form" ng-submit="registerNewsletter()" class="m-b-20 contact-form">
                                       <div class="newsletter_wrap">
                                          <input ng-model="newsletter.Email" required="" id="contact_email" autocomplete="off" type="email">
                                          <label>Email của bạn </label>
                                          <button class="btn-newsletter" type="submit">
                                          <span><i class="fa fa-paper-plane-o"></i></span>
                                          </button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <!-- End footer col 3 -->
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- footer col 4 -->
                              <div class="footer_block">
                                 <h4 class="footer_block_title">
                                    Theo dõi trên Fanpage
                                 </h4>
                                 <div class="block_content">
                                    <div class="fb-page" data-small-header="true" data-href="https://www.facebook.com/freshmart.com" data-tabs="message" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                                 </div>
                              </div>
                              <!-- End footer col 4 -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="footer_bottom">
                  <div class="container">
                     <div class="footer_bottom_wrap">
                        <div class="row">
                           <div class="col-lg-7">
                              <div class="footer_address">
                                 <p><span>SIÊU THỊ FRESH MART</span></p>
                                 <p><span>Địa chỉ: Quang Trung, P.14, Q.G&#242; Vấp, Tp.HCM</span></p>
                                 <p><span>Số điện thoại: 1900.XXXX</span></p>
                                 <p><span>Số di động: 0908.XXXXXX</span></p>
                                 <p><span>Email: freshmart.com.vn</span></p>
                              </div>
                           </div>
                           <div class="col-lg-5 text-right text-center-xs">
                              <div class="copy_right">
                                 <p>
                                    &copy; 2020. Bản quyền thuộc về <a rel="nofollow" href="http://www.freshmart.com/">Fresh Mart</a>. Powered by <a href="http://www.freshmart.com/">FreshMart.com</a>
                                 </p>
                              </div>
                              <div class="social_footer">
                                 <ul>
                                    <li><a><span><i class="fa fa-facebook"></i></span></a></li>
                                    <li><a><span><i class="fa fa-twitter"></i></span></a></li>
                                    <li><a><span><i class="fa fa-google-plus"></i></span></a></li>
                                    <li><a><span><i class="fa fa-youtube"></i></span></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </footer>
            
         </div>
      </div>
      <div style="display: none;" id="loading-mask">
         <div id="loading_mask_loader" class="loader">
            <img alt="Loading..." src="Public/frontend/Images/ajax-loader-main.gif" />
            <div>
               Please wait...
            </div>
         </div>
      </div>
      <a href="javascript:void(0);" class="back-to-top"><span>Top</span></a>
   </body>
   <!-- Mirrored from runecom04.runtime.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Dec 2020 10:40:31 GMT -->
</html>
<script type="text/javascript">
   $(".header-content").css({ "background": '' });
   $("html").addClass('');
</script>