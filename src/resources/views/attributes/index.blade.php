@php
    $route = \Route::current();
    $routeName = $route->getName();
@endphp
@extends(config('attribute.master_layout'))
@section('content')
    @include('common.content_header', ['name' => 'Danh sách thuộc tính html'])
    <!-- page content -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Danh sách thuộc tính html</h5>
            </div>
            <table class="table datatable-fixed-both" width="100%">
                <thead id="checkbox_all">
                    <tr>
                        <th class="align-left">STT</th>
                        <th class="align-left">Tiêu đề</th>
                        <th class="align-left">Option value</th>
                        <th class="align-left">Tên trường</th>
                        <th class="align-left">Loại trường</th>
                        <th class="align-left">Module</th>
                        <th class="all text-center sorting_disabled">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="checkbox_list">
                    @php $i = 1 @endphp
                    @foreach ($rows as $key => $row)
                        <tr>
                            <td class="a-center ">
                                {{ $i++ }}
                            </td>
                            <td>
                                {{ $row['title'] ?? '' }}
                            </td>
                            <td>
                                {{ $row['option_value'] ?? '' }}
                            </td>
                            <td>
                                {{ $row['name'] ?? '' }}
                            </td>
                            <td>
                                {{ $row['type'] ?? '' }}
                            </td>
                            <td>
                                {{ $row['module'] ?? '' }}
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {!! menuAttribute($row) !!}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {!! $pagination ?? '' !!}
            </div>
        </div>
    </div>
@stop
@section('left-slidebar')
    @include('attributes::attributes.filter')
@endsection
