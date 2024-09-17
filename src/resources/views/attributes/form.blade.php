@extends(config('attribute.master_layout'))
@section('content')
    <div class="content">
        <div class="card">
            <form class="ajax-submit-form" action="{{ $action }}" method="{{ $method }}">
                <div class="card-header header-elements-inline bg-">
                    <h5 class="card-title">Thông tin thuộc tính</h5>
                    <div class="header-elements">
                        <button id="submit_class" type="submit" class="btn btn-success ajax-submit-button">Lưu thông tin <i
                                class="icon-paperplane ml-2"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tiêu đề <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input required name="title" type="text" placeholder="Tiêu đề" class="form-control"
                                        value="{{ $row['title'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Option value <span
                                        style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <select name="option_value" required class="form-control select2_single">
                                        <option value="input"
                                            {{ !empty($row['option_value']) && $row['option_value'] == 'input' ? 'selected' : '' }}>
                                            Input
                                        </option>
                                        <option value="select"
                                            {{ !empty($row['option_value']) && $row['option_value'] == 'select' ? 'selected' : '' }}>
                                            Select
                                        </option>
                                        <option value="checkbox"
                                            {{ !empty($row['option_value']) && $row['option_value'] == 'checkbox' ? 'selected' : '' }}>
                                            Checkbox
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tên trường <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input name="name" required type="text" placeholder="Nhập tên trường"
                                        class="form-control" value="{{ $row['name'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Loại trường <span
                                        style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <select name="type" required class="form-control select2_single">
                                        <option value="input"
                                            {{ !empty($row['type']) && $row['type'] == 'text' ? 'selected' : '' }}>
                                            Text
                                        </option>
                                        <option value="select"
                                            {{ !empty($row['type']) && $row['type'] == 'file' ? 'selected' : '' }}>
                                            File
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Module <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input name="module" type="text" required placeholder="employee..."
                                        class="form-control" value="{{ $row['module'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Class <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input name="class" type="text" required placeholder="Nhập class"
                                        class="form-control" value="{{ $row['class'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Id</label>
                                <div class="col-lg-9">
                                    <input name="id" type="text" placeholder="id" class="form-control"
                                        value="{{ $row['id'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Placeholder</label>
                                <div class="col-lg-9">
                                    <input name="placeholder" type="text" placeholder="Nhập số điện thoại nơi làm việc"
                                        class="form-control" value="{{ $row['placeholder'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Required</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" name="is_required" value="1" class="form-control-sm"
                                        <?php echo isset($row['is_required']) && $row['is_required'] == '1' ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Multiple</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" name="is_multiple" value="1" class="form-control-sm"
                                        <?php echo isset($row['is_multiple']) && $row['is_multiple'] == '1' ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Data channel</label>
                                <div class="col-lg-9">
                                    <input name="data_channel" type="text" placeholder="env('STATIC_CHANNEL')"
                                        class="form-control" value="{{ $row['data_channel'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Data type</label>
                                <div class="col-lg-9">
                                    <input name="data_type" type="text" placeholder="file" class="form-control"
                                        value="{{ $row['data_type'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Data get</label>
                                <div class="col-lg-9">
                                    <input name="data_get" type="text" placeholder="all" class="form-control"
                                        value="{{ $row['data_get'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Data module</label>
                                <div class="col-lg-9">
                                    <input name="data_module" type="text" placeholder="employee, city..."
                                        class="form-control" value="{{ $row['data_module'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Help text</label>
                                <div class="col-lg-9">
                                    <input name="help_text" type="text" placeholder="trường hợp..."
                                        class="form-control" value="{{ $row['help_text'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
