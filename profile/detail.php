<div class="full practice pb-5">
	<div class="container mt-4 mb-3">
	<div class="row">
	<div class="col-md-3">
		<div class="card">
			<div class="list-group" ng-init="selectedSection='info'">
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'info'}" ng-click="selectedSection='info'">
					Thông tin cá nhân
				</a>
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'luyentap'}" ng-click="selectedSection='luyentap'">
					Luyện tập các môn
				</a>
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'tonghop'}" ng-click="selectedSection='tonghop'">
					Ôn luyện tổng hợp
				</a>
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'tienganh'}" ng-click="selectedSection='tienganh'">
					Ôn luyện tiếng anh
				</a>
				
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'thithu'}" ng-click="selectedSection='thithu'">
					Thi thử trần đại nghĩa
				</a>
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'dethitdn'}" ng-click="selectedSection='dethitdn'">
					Đề thi trần đại nghĩa các năm
				</a>
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'testall'}" ng-click="selectedSection='testall'">
				Tổng hợp các bài thi
				</a>
				<a class="list-group-item list-group-item-action" href="#" onclick="return false;" ng-class="{'active': selectedSection === 'report'}" ng-click="selectedSection='report'">
				Báo lỗi
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-9">

		<div class="main-shadow full p-3">
			<div class="full  p-3 mb-3" ng-show="selectedSection==='info'">
				<h4 class="text-center t-weight">THÔNG TIN CÁ NHÂN</h4>				
				<div class="row">
					<div class="col-md-4">
						<img src="{{userDetail.avatar}}?t=<?php echo time();?>" alt="avatar" class="rounded-circle" alt="Cinque Terre" width="256" height="256">
						<br>
						
					</div>
					<div class="col-md-8" >
						<!--show infor -->
						<div class="full" ng-hidden="editInfor">
							<ul class="list-unstyled" >
								<li><strong>Họ và tên:</strong> {{userDetail.name}}</li>
								<li><strong>Nick name:</strong> {{userDetail.username}}</li>
								<li><strong>Ngày sinh:</strong> {{userDetail.birthday | date:"MM/dd/yyyy"}}</li>
								<li ng-hidden="userDetail.sex"><strong>Giới tính:</strong> Nữ</li>
								<li ng-show="userDetail.sex"><strong>Giới tính:</strong> Nam</li>
								<li><strong>Địa chỉ:</strong> {{userDetail.address}}</li>
								<li><strong>Trường:</strong>{{userDetail.schoolname}} </li>
								<li><strong>Lớp:</strong> {{userDetail.classname}}</li>
								<li><strong>Tỉnh/TP:</strong> {{userDetail.areacode}}</li>													
								<li ng-if="<?php echo $_SESSION['checkPayment']; ?>"><strong>Thời hạn sản phẩm từ ( <?php echo $_SESSION['paymentDate']; ?> đến <?php echo $_SESSION['expiredDate']; ?> )</strong></li>
								<button type="button" class="btn btn-primary" ng-click="editInforUser()">Sửa thông tin</button>
							</ul>							
							
						</div>
						<!--edit infor -->
						<div class="full bg-light-2" ng-show="editInfor" >
							<!--edit infor -->
							<form >
							  <div class="form-row">
							    <div class="form-group col-md-4">
							      <label for="name">Họ và Tên(*) :</label>
							      <input type="text" class="form-control" ng-model="userDetail.name" required placeholder="Họ và Tên">
							    </div>
							    <div class="form-group col-md-3">
							      <label for="phone">Điện thoại (*) :</label>
							      <input type="text" class="form-control" ng-model="userDetail.phone" required placeholder="Điện thoại">
							    </div> 
							    <div class="form-group col-md-3">
							      <label for="inputState">Giới tính: </label>
							      <select ng-model="userDetail.sex" required  class="form-control" >
							        <option value="1" ng-selected="userDetail.sex==1">Nam</option>
							        <option value="0" ng-selected="userDetail.sex==0">Nữ</option>
							      </select>
							    </div>
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-md-4">
									<label for="inputAddress2">Ngày sinh: </label>
							    	<input type="date" class="form-control" ng-model="userDetail.birthday"  placeholder="Ngày sinh" required >
								</div>
							  	<div class="form-group col-md-6">
								    <label for="inputAddress">Địa chỉ :</label>
								    <input type="text" class="form-control" ng-model="userDetail.address" required placeholder="Quận 1- TPHCM">
								</div>
								
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-4">
							      <label for="school">Trường :</label>
							      <input type="text" class="form-control" ng-model="userDetail.schoolname" required placeholder="Trường học">
							    </div>
							    <div class="form-group col-md-3">
							      <label for="class">Lớp :</label>
							      <input type="text" class="form-control" ng-model="userDetail.classname" required placeholder="Lớp học">
							    </div>
							    <div class="form-group col-md-3" ng-init="userDetail.areacode = '2'">
							      <label for="input">Tỉnh(TP): </label>
							      <select ng-model="userDetail.areacode"  class="form-control" >							      		
							        <option value="{{areaCode.id}}" ng-repeat="areaCode in areaCodes">{{areaCode.name}}</option>						        
							      </select>
							    </div>
							    <!-- <div class="form-group col-md-3">
							      <label for="input">Tỉnh(TP): </label>
							      <select ng-model="userDetail.areacode" class="form-control">
							        <option value="{{areaCode.id}}" ng-repeat="areaCode in areaCodes">{{areaCode.name}}</option>						        
							      </select>
							    </div> -->
							  </div>
							  <div class="form-group alert alert-success" ng-show="success" ng-bind-html="message"></div>
							  <button ng-click="editUser()" class="btn btn-primary">Cập nhật</button>
							  <button type="button" ng-click="cancelEditUser()" class="btn btn-secondary">Hủy</button>
							</form>	

							<hr />
						</div>
						
						<!--edit password -->
						<div class="full bg-light-2" ng-show="editInfor" >
							<form>
							  <div class="form-row">
							    <div class="form-group col-md-4">
							      <label for="name">Mật khẩu cũ(*) :</label>
							      <input type="password" class="form-control" ng-model="editPassword.oldPassword"  placeholder="Mật khẩu cũ" required>
							    </div>
							    
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-md-4">
							      <label for="password">Mật khẩu mới (*) :</label>
							      <input type="password" class="form-control" ng-model="editPassword.newPassword"  placeholder="Mật khẩu mới" required>
							    </div>
							    <div class="form-group col-md-4">
							      <label for="password">Nhập lại mật khẩu mới (*) :</label>
							      <input type="password" class="form-control" ng-model="editPassword.reNewPassword" placeholder="Mật khẩu mới" required>
							    </div>							    
							  </div>
							  <div class="form-group alert" ng-class="{'alert-danger': editPassword.success==0, 'alert-success': editPassword.success==1}" ng-show="editPassword.message" ng-bind-html="editPassword.message">

							 </div>
							  <button ng-click="changePassword()" class="btn btn-primary">Cập nhật</button>
							  <button type="button" class="btn btn-secondary" ng-click="cancelEditUser()">Hủy</button>
							</form>

							<hr />

						</div>

						

						<!--edit avatar -->
						<div class="full bg-light-2" ng-show="editInfor" >
							<form enctype="multipart/form-data">				
								<div class="clearfix">
								  	<img src="" id="avatarPreview" alt="" class="rounded-circle" alt="Cinque Terre" width="304" height="304">
								  </div>
								<div class="custom-file">
																	  
								  <input type="file" id="avatar" class="custom-file-input" id="customFile" accept="image/*" ng-model="userAvatar" maxsize="50" required onchange="previewImg(this)" />
								  <label class="custom-file-label" for="customFile">{{inputFile}}</label>
								   <span ng-show="form.files.$error.maxsize">Files must not exceed 50 KB </span>
								  
								</div>
								<div class="form-group alert" ng-class="{'alert-danger': editAvatar.success==0, 'alert-success': editAvatar.success==1}" ng-show="editAvatar.message" ng-bind-html="editAvatar.message">

							 </div>
								<button type="submit" ng-click="changeAvatar()" class="btn btn-primary">Cập nhật</button>
								  <button type="button" class="btn btn-secondary" ng-click="cancelEditUser()">Hủy</button>
							</form>
						</div>
						
					</div>
				</div>
			</div>
			
					<div class="section-content pt-2  mb-5" id="section-content">
			  	<div class="section-pane bg-light-2" id="luyentap" role="tabpanel" aria-labelledby="luyentap-tab" ng-show="selectedSection==='luyentap'" >
			  		<h5>Bài luyện tập các môn học</h5>
			  		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Môn học</th>
					      <th scope="col" style="width: 30%;">Chủ đề</th>
					      <th scope="col">Bài</th>
					      <th scope="col">Điểm</th>
					      <th scope="col">Ngôn ngữ</th>
					      <th scope="col">Thời gian làm bài</th>
					      <th scope="col">Ngày</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="lesson in lessons">
					      <th scope="row">{{$index +1}}</th>
					      <td >{{getSubject(lesson.categoryId)}}</td>
					      <td ng-bind="lesson.name"></td>
					      <td><a href="/book.php?id={{lesson.id}}">Bài {{lesson.exercise_number}}</a></td>
					      <td ng-bind="lesson.mark"></td>
					      <td ng-bind="lesson.lang"></td>
					      <td ng-bind="lesson.duringTime"></td>
					      <td >{{lesson.startTime| date:'MM/dd/yyyy @ h:mma'}}</td>
					    </tr>					    
					    
					  </tbody>
					</table>
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item" ng-class="{'active': lessonPageSelected === 0}">
					      <a class="page-link" ng-click="lessonPage(0)"> Trang đầu </a>
					    </li>
					    <li class="page-item" ng-repeat="lessonItem in lessonQuantity" ng-class="{'active': lessonPageSelected == lessonItem}" ng-show="lessonItem === 0 || lessonItem === lessonQuantity.length-1 || (lessonItem > lessonPageSelected - 5) && (lessonItem < lessonPageSelected + 5)">
					    	<a class="page-link" ng-click="lessonPage(lessonItem)">{{lessonItem+1}}</a>
					    </li>
					    			    
					    
					  </ul>
					</nav>
			  	</div>
			  	<div class="section-pane bg-light-2" id="deluyentap" role="tabpanel" aria-labelledby="deluyentap-tab" ng-show="selectedSection==='tonghop'">
			  		<h5>Ôn luyện tổng hợp</h5>
			  		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Đề thi</th>					      
					      <th scope="col">Điểm</th>
					      <th scope="col">Ngôn ngữ</th>
					      <th scope="col">Thời gian làm bài</th>
					      <th scope="col">Ngày</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="test in historyTests">
					      <th scope="row">{{$index +1}}</th>
					      <td><a href="/book.php?id={{test.id}}">{{test.name}}</a></td>
					      <td ng-bind="test.mark"></td>
					      <td ng-bind="test.lang"></td>
					      <td ng-bind="test.duringTime"></td>
					      <td >{{test.startTime| date:'MM/dd/yyyy @ h:mma'}}</td>
					      
					    </tr>					    
					    
					  </tbody>
					</table>
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item " ng-class="{'active': testPageSelected === 0}">					      
					      	<a class="page-link"  ng-click="testPage(0)">Trang đầu</a>      
					  	  
					    </li>
					    <li class="page-item"  ng-class="{'active': testPageSelected === testitem}" ng-repeat="testitem in testQuantity" ng-show="testitem === 0 || testitem === testQuantity.length-1 || (testitem > testPageSelected - 5) && (testitem < testPageSelected + 5)">
					    	<a class="page-link"  ng-click="testPage(testitem)">{{testitem+1}}</a>
					    </li>
					    
					  </ul>
					</nav>
			  	</div>

			  	<div class="section-pane bg-light-2" id="tienganh" role="tabpanel" aria-labelledby="tienganh-tab" ng-show="selectedSection==='tienganh'">
			  		<h5>Ôn luyện tiếng Anh</h5>
			  		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Đề thi</th>					      
					      <th scope="col">Điểm</th>
					      <th scope="col">Ngôn ngữ</th>
					      <th scope="col">Thời gian làm bài</th>
					      <th scope="col">Ngày</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="testE in testEnglish">
					      <th scope="row">{{$index +1}}</th>
					      <td><a href="/book.php?id={{testE.id}}">{{testE.name}}</a></td>
					      <td ng-bind="testE.mark"></td>
					      <td ng-bind="testE.lang"></td>
					      <td ng-bind="testE.duringTime"></td>
					      <td >{{testE.startTime| date:'MM/dd/yyyy @ h:mma'}}</td>
					      
					    </tr>					    
					    
					  </tbody>
					</table>
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item " ng-class="{'active': testEPageSelected === 0}">					      
					      	<a class="page-link"  ng-click="testEPage(0)">Trang đầu</a>      
					  	  
					    </li>
					    <li class="page-item"  ng-class="{'active': testEPageSelected === testEitem}" ng-repeat="testEitem in testEQuantity" ng-show="testEitem === 0 || testEitem === testEQuantity.length-1 || (testEitem > testEPageSelected - 5) && (testEitem < testEPageSelected + 5)">
					    	<a class="page-link"  ng-click="testEPage(testEitem)">{{testEitem+1}}</a>
					    </li>
					    
					  </ul>
					</nav>
			  	</div>

			  	<div class="section-pane bg-light-2" id="thithu2" role="tabpanel" aria-labelledby="thithu-tab" ng-show="selectedSection==='thithu'">
			  		<h5>Đề thi thử</h5>
			  		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Đề thi</th>					      
					      <th scope="col">Điểm</th>
					      <th scope="col">Ngôn ngữ</th>
					      <th scope="col">Thời gian làm bài</th>
					      <th scope="col">Ngày</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="tdnTest in tdnTests">
					      <th scope="row">{{$index +1}}</th>
					      <td><a href="/book.php?id={{tdnTest.id}}">{{tdnTest.name}}</a></td>
					      <td ng-bind="tdnTest.mark"></td>
					      <td ng-bind="tdnTest.lang"></td>
					      <td ng-bind="tdnTest.duringTime"></td>
					      <td >{{tdnTest.startTime| date:'MM/dd/yyyy @ h:mma'}}</td>
					      
					    </tr>					    
					    
					  </tbody>
					</table>
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item" ng-class="{'active': tdnTestPageSelected === 0}">					      
					      	<a class="page-link"  ng-click="tdnTestPage(0)">Trang đầu</a>      
					  	  
					    </li>
					    <li class="page-item" ng-class="{'active': tdnTestPageSelected === tdnTestitem}" ng-repeat="tdnTestitem in tdnTestQuantity" ng-show="tdnTestitem === 0 || tdnTestitem === tdnTestQuantity.length-1 || (tdnTestitem > tdnTestPageSelected - 5) && (tdnTestitem < tdnTestPageSelected + 5)">
					    	<a class="page-link"   ng-click="tdnTestPage(tdnTestitem)">{{tdnTestitem +1}}</a>
					    </li>					   
					    
					  </ul>
					</nav>
				</div>

				<div class="section-pane bg-light-2" id="tdn" role="tabpanel" aria-labelledby="tdn-tab" ng-show="selectedSection==='dethitdn'">
			  		<h5>Đề thi chính thức các năm</h5>
			  		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Đề thi</th>					      
					      <th scope="col">Điểm</th>
					      <th scope="col">Ngôn ngữ</th>
					      <th scope="col">Thời gian làm bài</th>
					      <th scope="col">Ngày</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="tdnRealTest in tdnRealTests">
					      <th scope="row">{{$index +1}}</th>
					      <td><a href="/book.php?id={{tdnRealTest.id}}">{{tdnRealTest.name}}</a></td>
					      <td ng-bind="tdnRealTest.mark"></td>
					      <td ng-bind="tdnRealTest.lang"></td>
					      <td ng-bind="tdnRealTest.duringTime"></td>
					      <td >{{tdnRealTest.startTime| date:'MM/dd/yyyy @ h:mma'}}</td>
					      
					    </tr>					    
					    
					  </tbody>
					</table>
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item" ng-class="{'active': tdnRealTestPageSelected === 0}">					      
					      	<a class="page-link"  ng-click="tdnRealTestPage(0)">Trang đầu</a>      
					  	  
					    </li>
					    <li class="page-item" ng-class="{'active': tdnRealTestPageSelected === tdnRealTestitem}" ng-repeat="tdnRealTestitem in tdnRealTestQuantity" ng-show="tdnRealTestitem === 0 || tdnRealTestitem === tdnRealTestQuantity.length-1 || (tdnRealTestitem > tdnRealTestPageSelected - 5) && (tdnRealTestitem < tdnRealTestPageSelected + 5)">
					    	<a class="page-link"   ng-click="tdnRealTestPage(tdnRealTestitem)">{{tdnRealTestitem +1}}</a>
					    </li>					   
					    
					  </ul>
					</nav>
				</div>

				<div class="section-pane bg-light-2" id="testAll" role="tabpanel" aria-labelledby="testAll-tab"  ng-show="selectedSection==='testall'" >
			  		<h5>Tổng hợp các bài thi</h5>
			  		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Đề thi</th>					      
					      <th scope="col">Điểm</th>
					      <th scope="col">Ngôn ngữ</th>
					      <th scope="col">Thời gian làm bài</th>
					      <th scope="col">Ngày</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="testAll in testAlls">
					      <th scope="row">{{$index +1}}</th>
					      <td><a href="/book.php?id={{testAll.id}}">{{testAll.name}}</a></td>
					      <td ng-bind="testAll.mark"></td>
					      <td ng-bind="testAll.lang"></td>
					      <td ng-bind="testAll.duringTime"></td>
					      <td >{{testAll.startTime| date:'MM/dd/yyyy @ h:mma'}}</td>
					      
					    </tr>					    
					    
					  </tbody>
					</table>
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item" ng-class="{'active': testAllPageSelected === 0}">					      
					      	<a class="page-link"  ng-click="testAllPage(0)">Trang đầu</a>      
					  	  
					    </li>
					    <li class="page-item" ng-class="{'active': testAllPageSelected === testAllitem}" ng-repeat="testAllitem in testAllQuantity" ng-show="testAllitem === 0 || testAllitem === testAllQuantity.length-1 || (testAllitem > testAllPageSelected - 5) && (testAllitem < testAllPageSelected + 5)">
					    	<a class="page-link"   ng-click="testAllPage(testAllitem)">{{testAllitem +1}}</a>
					    </li>					   
					    
					  </ul>
					</nav>
				</div>
				
				<div class="section-pane bg-light-2" id="report" role="tabpanel" aria-labelledby="report-tab"  ng-show="selectedSection==='report'" >

					<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Luyện tập</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Đề thi</a>
					
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<div class="table-responsive">
						<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Câu hỏi và Báo lỗi</th>
					      <th scope="col">Bài</th>
					      <th scope="col">Ngày</th>
								<th scope="col">Trạng thái</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="error in errorSubjects">
					      <th scope="row">{{$index +1}}</th>
					      <td>
								<strong>Câu hỏi:</strong><br/>
								<div class="ptnn-title full" mathjax-bind="error.name" ></div><br/>
								<strong>Báo lỗi:</strong><br/>
								<div class="ptnn-title full" mathjax-bind="error.content" >
								</td>
					      <td >
								{{ (error.categoryName !== null) ? 'Môn: ' + error.categoryName : ''}} <br/> {{ (error.topicName !== null) ? 'Bài học: ' + error.topicName : '' }} <br/> {{ (error.exercise_number !== null) ? ' Bài:  ' + error.exercise_number : '' }}
								</td>
					      <td >{{error.created| date:'MM/dd/yyyy @ h:mma'}}</td>
								<td>
								{{ errorStatus(error.status) }} <br />
								<!-- Button trigger modal -->
								<div ng-show="error.status == 1">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#errorSubject{{$index+1}}">
										Xem trả lời
									</button>

										<!-- Modal -->
								<div class="modal fade" id="errorSubject{{$index+1}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">Nội dung</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												{{error.note}}
											</div>
											
										</div>
									</div>
								</div>

								</div>
								
								</td>
								
							
					      
					    </tr>					    
					    
					  </tbody>
					</table>
					</div>
						<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item" ng-class="{'active': selectedErrorSubjectsPage === 0}">					      
					      	<a class="page-link"  ng-click="paginationErrorSubject(0)">Trang đầu</a>      
					  	  
					    </li>
					    <li class="page-item" ng-class="{'active': selectedErrorSubjectsPage === page}" ng-repeat="page in pageErrorSubject" ng-show="page === 0 || page === selectedErrorSubjectsPage.length-1 || (page > selectedErrorSubjectsPage - 5) && (page < selectedErrorSubjectsPage + 5)">
					    	<a class="page-link"   ng-click="paginationErrorSubject(page)">{{page +1}}</a>
					    </li>					   
					    
					  </ul>
					</nav>

					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<div class="table-responsive">
			  		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Câu hỏi và Báo lỗi</th>
					      <th scope="col">Đề thi</th>
					      <th scope="col">Ngày</th>
								<th scope="col">Trạng thái</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="error in errorTests">
					      <th scope="row">{{$index +1}}</th>
					      <td>
								<strong>Câu hỏi:</strong><br/>
								<div class="ptnn-title full" mathjax-bind="error.name" ></div><br />
								<strong>Báo lỗi:</strong><br/>
								<div class="ptnn-title full" mathjax-bind="error.content" ></div>
								</td>
					      <td >
								{{ (error.categoryName !== null) ? 'Chuyên mục: ' + error.categoryName : ''}} <br/> {{ (error.parentTestName !== null) ? error.parentTestName : '' }} <br/> {{ (error.testName !== null) ? error.testName : '' }}
								</td>
					      <td >{{error.created| date:'MM/dd/yyyy @ h:mma'}}</td>
								<td>
								{{ errorStatus(error.status) }} <br />
								<!-- Button trigger modal -->
								<div ng-show="error.status == 1">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#errorTest{{$index+1}}">
										Xem trả lời
									</button>
									<!-- Modal -->
									<div class="modal fade" id="errorTest{{$index+1}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Nội dung</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													{{error.note}}
												</div>
												
											</div>
										</div>
									</div>
								</div>
								
								</td>
								
								
					      
					    </tr>					    
					    
					  </tbody>
					</table>
					</div>
						<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item" ng-class="{'active': selectedErrorTestPage === 0}">					      
					      	<a class="page-link"  ng-click="paginationErrorSubject(0)">Trang đầu</a>      
					  	  
					    </li>
					    <li class="page-item" ng-class="{'active': selectedErrorTestPage === page}" ng-repeat="page in pageErrorTest" ng-show="page === 0 || page === selectedErrorTestPage.length-1 || (page > selectedErrorTestPage - 5) && (page < selectedErrorTestPage + 5)">
					    	<a class="page-link"   ng-click="paginationErrorSubject(page)">{{page +1}}</a>
					    </li>					   
					    
					  </ul>
					</nav>
					
					</div>
				
				</div>
					
					

				</div>

			</div>
		</div>
	</div>
	</div>
	</div>
</div>

<script>
	function previewImg(userAvatar) {
		var reader = new FileReader();
		reader.onloadend = function() {
		  	var base64_avatar = reader.result;
		    jQuery('#avatarPreview').attr('src', base64_avatar);

		}
  		reader.readAsDataURL(userAvatar.files[0]);
	}
</script>
