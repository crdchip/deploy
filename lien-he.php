<?php 
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';
   $db = new Database;
   session_start();
   ob_start();
?>
<?php require_once __DIR__. '/Layouts/header.php'; 

?>
         <!-- Nôi dung chính -->
         <div class="main">
            <div class="container">
              <div class="row">
                     <div class="col-md-3">
                        <script src="Public/frontend/app/services/moduleServices.js"></script>
                        <script src="Public/frontend/app/controllers/moduleController.js"></script>
                        <!--Begin-->
                        <div class="box-support-online" ng-controller="moduleController" ng-init="initSupportOnlineController('Shop','SupportOnlines')">
                           <h3><span>Hỗ trợ trực tuyến</span></h3>
                           <div class="support-online-block">
                              <div class="support-hotline">
                                 HOTLINE<br><span>{{shop.Hotline}}</span>
                              </div>
                              <div class="support-item" ng-repeat="item in SupportOnlines">
                                 <div class="name">
                                    {{item.FullName}}  <b>{{item.Phone}}</b>
                                 </div>
                                 <ul>
                                    <li ng-if="item.Skype!=''&&item.Skype!=null">
                                       <a ng-href="skype:{{item.Skype}}?chat" title="{{item.FullName}}">
                                       <img width="70" src="">
                                       </a>
                                    </li>
                                    <li ng-if="item.Viber!=''&&item.Viber!=null" class="social">
                                       <a href="tel:{{item.Viber}}" title="{{item.FullName}}" target="_blank"> <img src="Public/frontend/Images/icon-viber.png" alt="Viber"></a>
                                       <span class="phone"><a href="tel:{{item.Viber}}" title="{{item.FullName}}" target="_blank">{{item.Viber}} </a></span>
                                    </li>
                                    <li ng-if="item.Zalo!=''&&item.Zalo!=null" class="social">
                                       <a href="tel:{{item.Zalo}}" title="{{item.FullName}}" target="_blank"> <img src="Public/frontend/Images/icon-zalo.png" alt="Zalo"></a>
                                       <span class="phone"><a href="tel:{{item.Zalo}}" title="{{item.FullName}}" target="_blank">{{item.Zalo}} </a></span>
                                    </li>
                                    <li ng-if="item.Facebook!=''&&item.Facebook!=null" class="social">
                                       <a href="notfounda963.html" title="{{item.FullName}}" target="_blank"> <img src="Public/frontend/Images/icon-facebook.png" alt="Facebook"></a>
                                       <span class="phone"><a href="notfounda963.html" title="{{item.FullName}}" target="_blank">{{item.FullName}} </a></span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <!--End-->
                        <script type="text/javascript">
                           window.Shop = {"Name":"SIEU THI FRESH MART","Email":"freshmart@gmail.com","Phone":"(08) 66 85 85 38","Logo":"Public/frontend//Uploads/shop2005/images/logo.png","Fax":"(08) 66 85 85 38","Website":"http://www.freshmart.com","Hotline":"0908 77 00 95","Address":"5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.HCM","Fanpage":"https://www.facebook.com/freshmart.com","Google":null,"Facebook":null,"Youtube":null,"Twitter":null,"IsBanner":false,"IsFixed":false,"BannerImage":null};
                           window.SupportOnlines = [];
                        </script>                    
                     </div>
                     <div class="col-md-9">
                        <script src="Public/frontend/app/services/contactServices.js"></script>
                        <script src="Public/frontend/app/controllers/contactController.js"></script>
                        <!--Begin-->
                        <div class="contact-content clearfix" ng-controller="contactController" ng-init="initController('Shop','Maps')">
                           <div class="content clearfix">
                            
                              <div class="col-md-7" id="col-left contactFormWrapper">
                                 <h3>Liên hệ với chúng tôi</h3>
                                 <hr class="line-left">
                                 <p>
                                    Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể.
                                 </p>
                                 <form ng-submit="sendContact()">
                                    <div class="form-group">
                                       <label for="contactFormName" class="sr-only">Tên</label>
                                       <input required="" id="contactFormName" class="form-control input-lg" ng-model="Name" placeholder="Tên của bạn" autocapitalize="words" value="" type="text">
                                    </div>
                                    <div class="form-group">
                                       <label for="contactFormName" class="sr-only">Số điện thoại</label>
                                       <input required="" id="contactFormPhone" class="form-control input-lg" ng-model="Phone" placeholder="Số điện thoại của bạn" autocapitalize="words" value="" type="text">
                                    </div>
                                    <div class="form-group">
                                       <label for="contactFormEmail" class="sr-only">Email</label>
                                       <input required="" name="contact[email]" placeholder="Email của bạn" ng-model="Email" class="form-control input-lg" autocorrect="off" autocapitalize="off" value="" type="email">
                                    </div>
                                    <div class="form-group">
                                       <label for="contactFormTitle" class="sr-only">Tiêu đề</label>
                                       <input required="" id="contactFormTitle" class="form-control input-lg" ng-model="Title" placeholder="Tiêu đề" value="" type="text">
                                    </div>
                                    <div class="form-group">
                                       <label for="contactFormMessage" class="sr-only">Nội dung</label>
                                       <textarea required="" rows="6" ng-model="Content" class="form-control" placeholder="Viết bình luận" id="contactFormMessage"></textarea>
                                    </div>
                                    <input class="btn btn-primary btn-lg" value="Gửi liên hệ" type="submit">
                                 </form>
                              </div>
                              <div class="col-md-5" id="col-right">
                                 <h3>Địa chỉ liên lạc</h3>
                                 <hr class="line-right">
                                 <h3 class="name-company">{{shop.Name}}</h3>
                                 <p>{{shop.Sologan}}</p>
                                 <ul class="info-address">
                                    <li class="m-b-5">
                                       <i class="glyphicon glyphicon-map-marker m-r-5"></i>
                                       <span>{{shop.Address}}</span>
                                    </li>
                                    <li class="m-b-5">
                                       <i class="glyphicon glyphicon-envelope m-r-5"></i>
                                       <span>{{shop.Email}}</span>
                                    </li>
                                    <li class="m-b-5">
                                       <i class="glyphicon glyphicon-phone-alt m-r-5"></i>
                                       <span>{{shop.Phone}}</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <script type="text/javascript">
                           var map;
                           var infowindow;
                           var marker = new Array();
                           var old_id = 0;
                           var infoWindowArray = new Array();
                           var infowindow_array = new Array();
                           function initialize() {
                               var defaultLatLng = new google.maps.LatLng(10.845064529472292, 106.636744831799320);
                           
                               var myOptions = { zoom: 16, center: defaultLatLng, scrollwheel: true, mapTypeId: google.maps.MapTypeId.ROADMAP };
                               map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                               map.setCenter(defaultLatLng);
                           
                               if (Maps.length <= 0) {
                                   var arrLatLng = new google.maps.LatLng(10.845064529472292, 106.636744831799320);
                                   var myHtml = "<div class='map-description'> <strong>" + firstMap.Name + "</strong><br/>Địa chỉ: <span>" + firstMap.Address + "</span><br/>Điện thoại: <span>" + firstMap.Phone + "</span><br/></div>";
                                   infoWindowArray[firstMap.Id] = myHtml;
                                   loadMarker(arrLatLng, infoWindowArray[firstMap.Id], firstMap.Id);
                               }
                           
                               $.each(Maps, function (index, it) {
                                   var arrLatLng = new google.maps.LatLng(it.PosX, it.PosY);
                                   var myHtml = "<div class='map-description'> <strong>" + it.Name + "</strong><br/>Địa chỉ: <span>" + it.Address + "</span><br/>Điện thoại: <span>" + it.Phone + "</span><br/></div>";
                                   infoWindowArray[it.Id] = myHtml;
                                   loadMarker(arrLatLng, infoWindowArray[it.Id], it.Id);
                               });
                           
                           
                               moveToMaker(firstMap.Id);
                           }
                           function loadMarker(myLocation, myInfoWindow, id) {
                               marker[id] = new google.maps.Marker({ position: myLocation, map: map, visible: true });
                               var popup = myInfoWindow;
                               infowindow_array[id] = new google.maps.InfoWindow({ content: popup });
                               google.maps.event.addListener(marker[id], 'click', function () {
                                   if (id == old_id) return;
                                   if (old_id > 0)
                                       infowindow_array[old_id].close();
                                   infowindow_array[id].open(map, marker[id]);
                                   old_id = id;
                               });
                               google.maps.event.addListener(infowindow_array[id], 'closeclick', function () { old_id = 0; });
                           }
                           function moveToMaker(id) {
                               var location = marker[id].position;
                               map.setCenter(location);
                               if (old_id > 0)
                                   infowindow_array[old_id].close();
                               infowindow_array[id].open(map, marker[id]);
                               old_id = id;
                           }
                        </script>
                        <!--End-->
                        <script type="text/javascript">
                           var firstMap= {"Id":2005,"ShopId":0,"Name":"SIEU THI FRESH MART","Address":" Quang Trung, P.14, Q.Gò Vấp, Tp.HCM","Phone":"0908XXXXXX",,"Index":0,"Inactive":false};
                           var Maps= [];
                           window.Maps = Maps;
                           window.Shop = {"Name":"SIEU THI FRESH MART","Email":"freshmart@gmail.com","Phone":"0908xxxxxx","Logo":"Public/frontend/Uploads/shop2005/images/logo.png","Fax":"1900xxxx","Website":"http://www.freshmart.com","Hotline":"0908xxxxxx","Address":" Quang Trung, P.14, Q.Gò Vấp, Tp.HCM","Fanpage":"https://www.facebook.com/freshmart.com","Google":null,"Facebook":null,"Youtube":null,"Twitter":null,"IsBanner":false,"IsFixed":false,"BannerImage":null};
                           $(document).ready(function () {
                               initialize();
                           });
                        </script>
                     </div>
                  </div>
         </div>
         <?php require_once __DIR__. '/partner.php'; ?>
<?php require_once __DIR__. '/Layouts/footer.php'; ?>
<script  type="text/javascript" >
   $(document).ready(function(){
       $(".menu-quick-select ul").hide();
       $(".menu-quick-select").hover(function(){
           $(".menu-quick-select ul").show();
       },
       function(){
           $(".menu-quick-select ul").hide();
       });
   });
</script>