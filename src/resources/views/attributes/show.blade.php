@extends(config('attribute.master_layout'))
@section('content')
    @include('common.content_header', ['name' => 'Thông tin chi tiết'])
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Thông tin thuộc tính</h5>
                    </div>
                    <div class="card-body row">
                        <table class="table" width="100%">
                            <tr>
                                <th>Tiêu đề:</th>
                                <td>
                                    {{ $row['title'] ?? '' }}
                                    @if (!empty($row['is_required']))
                                        <span style="font-size: 13px;" class="text-danger">(trường bắt buộc)</span>
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <th>Loại trường:</th>
                                <td>
                                    {{ $row['option_field'] ?? '' }}
                                    @if (!empty($row['is_multiple']))
                                        <span style="font-size: 13px;" class="text-danger">(chọn nhiều)</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Giá trị:</th>
                                <td>
                                    @php
                                        $optionValue = $row['option_value'] ?? '';
                                    @endphp

                                    @if (strpos($optionValue, "\r\n") !== false)
                                        @php
                                            $options = explode("\r\n", $optionValue);
                                        @endphp

                                        @foreach ($options as $index => $option)
                                            @php
                                                [$key, $value] = explode(':', $option);
                                            @endphp

                                            <strong>{{ $key }}</strong>: {{ $value }}

                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @else
                                        {{ $optionValue }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tên trường:</th>
                                <td>{{ $row['name'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>Loại giá trị:</th>
                                <td>{{ $row['type'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>Module:</th>
                                <td>{{ $row['module'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>Class:</th>
                                <td>{{ $row['class'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>ID:</th>
                                <td>{{ $row['id'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>Placeholder:</th>
                                <td>{{ $row['placeholder'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>Data get:</th>
                                <td>{{ $row['data_get'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>Data module:</th>
                                <td>{{ $row['data_module'] ?? '' }} </td>
                            </tr>
                            <tr>
                                <th>Help text:</th>
                                <td>{{ $row['help_text'] ?? '' }} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
