<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tìm kiếm đặt phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label style="float: left" class="form-label">Mã đặt phòng</label>
                        <input type="text" class="form-control" id="recipient-name" name="id"
                               value="{{isset($_REQUEST['id']) ? $_REQUEST['id'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label style="float: left" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" id="recipient-name" name="name"
                               value="{{ (isset($_REQUEST['name']) ? $_REQUEST['name'] : '') }}">
                    </div>
                    <div class="form-group">
                        <label style="float: left" class="form-label">Trạng thái</label>
                        <input type="text" class="form-control" id="recipient-name" name="status"
                               value="{{ (isset($_REQUEST['status']) ? $_REQUEST['status'] : '') }}">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="apply-filter">Save changes</button>
            </div>
        </div>
    </div>
</div>
