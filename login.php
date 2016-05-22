  <!-- Modal -->
        <div id="loginModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-center">Thành viên đăng nhập</h3>
              </div>
              <div class="modal-body">
               <form role="form" action="/login" method="POST">
                  <div class="form-group">
                    <label for="email">Email đăng nhập</label>
                    <input type="email" name="txtEmail" class="form-control" id="email"  placeholder="Nhập email"/>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <input type="password" name="txtPassword" class="form-control" id="pwd" placeholder="Nhập password"/>
                  </div>
                  <div class="checkbox" >
                    <label><input type="checkbox" name="ckhRemember" style="position: inherit;margin-left: 0;"/> Ghi nhớ</label>
                  </div>
                  <button type="submit" class="btn btn-primary more" name="btnLogin">Đăng nhập</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              </div>
            </div>
        
          </div>
        </div>
    <!-- End login -->