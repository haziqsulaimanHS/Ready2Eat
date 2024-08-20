<div class="tab-pane fade" id="list-fpx" role="tabpanel" aria-labelledby="list-fpx-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.fpx-setting.update', 1)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>FPX Status</label>
                    <select name="status" id="" class="form-control">
                        <option {{$fpxSetting->status === 1 ? 'selected' : ''}} value="1">Enable</option>
                        <option {{$fpxSetting->status === 0 ? 'selected' : ''}} value="0">Disable</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

