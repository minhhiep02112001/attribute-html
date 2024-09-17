@extends('common.filter_layout')
@section('section_filter')
    <!-- Sidebar search -->
    <div class="sidebar-section">
        <div class="sidebar-section-header">
            <span class="font-weight-semibold">Cơ bản</span>
            <div class="list-icons ml-auto">
                <a href="#sidebar-search" class="list-icons-item" data-toggle="collapse">
                    <i class="icon-arrow-down12"></i>
                </a>
            </div>
        </div>
        <div class="collapse show" id="sidebar-search">
            <div class="sidebar-section-body">
                <div class="form-group">
                    <label class="control-label">Tiêu đề</label>
                    <input type="text" name="filter[title][like]" value="{{ $filter['title']['like'] ?? '' }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Tên trường</label>
                    <input type="text" name="filter[name][like]" value="{{ $filter['name']['like'] ?? '' }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Module</label>
                    <input type="text" name="filter[module][like]" value="{{ $filter['module']['like'] ?? '' }}"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>
@endsection
