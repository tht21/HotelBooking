<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tìm kiếm Nhân Viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label style="float: left" class="form-label">Tên Nhân Viên</label>
                        <input type="text" class="form-control" id="recipient-name" name="name"
                               value="{{ isset($_REQUEST['name']) ? $_REQUEST['name'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label style="float: left" class="form-label">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="recipient-name" name="phone"
                               value="{{ (isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '') }}">
                    </div>
                    <div class="form-group">
                        <label style="float: left" class="form-label">Địa Chỉ</label>
                        <input type="text" class="form-control" id="recipient-name" name="address"
                               value="{{ (isset($_REQUEST['address']) ? $_REQUEST['address'] : '') }}">
                    </div>
                    <div class="form-group">
                        <label style="float: left" class="form-label">Nhóm Nhân Viên</label>
                        <select class="form-select form-control" name="user_group_id">
                            @foreach($userGroups as $userGroup)
                                <option
                                    value="{{ $userGroup->id }}" @selected( isset($_REQUEST['user_group_id']) ? $_REQUEST['user_group_id'] == $userGroup->id : false )>
                                    {{ $userGroup->name }}
                                </option>
                            @endforeach
                        </select>
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
