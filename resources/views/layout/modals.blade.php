<!-- Modal -->
<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="OrderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Chọn món ăn</h5>
                <button type="button" class="close btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loại</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="selectTypeMenu">
                                    <option value="" selected disabled>Chọn loại món</option>
                                    @isset($types)
                                        @foreach ($types as $t)
                                            <option type="optionType" value="{{ $t->id }}">{{ $t->name }}
                                            </option>
                                        @endforeach

                                    @endisset

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Món ăn</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="selectOrder">
                                    <option selected value="" disabled>Chọn món</option>
                                </select>
                                <img id="previewOrder" class="border border-secondary mt-3" alt="your image"
                                    src="@if (isset($menu)) {{ $menu->hasImage->name }}@else{{ asset('dashboard-template/assets/images/blank.jpg') }} @endif"
                                    width="100" height="100" />
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Số lượng</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" min="1" id="orderQuant"
                                    placeholder="Chọn số lượng">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" id="confirmOrder" class="btn btn-primary">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="OrderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="OrderDetailsModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hoverable Table</h4>
                            <p class="card-description"> Add class <code>.table-hover</code>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
