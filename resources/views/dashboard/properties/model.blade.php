<div class="modal fade" id="status{{$i}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <form action="{{route('properties.active', $property->id)}}" method="get">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label  class="control-label">أختر الحالة</label>
                            <select style="width:100%" class="form-control select2" name="is_active" required>
                                <option value="1">موافقة</option>
                                <option value="2">رفض</option>

                              
  
                            </select>
                          
                        </div>
                        <div class="form-group">
                            <label  class="control-label">أعطى رسالة للعميل  </label>
                            <input type="text" class="form-control" name="admin_message" id="" >
                        </div>
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>