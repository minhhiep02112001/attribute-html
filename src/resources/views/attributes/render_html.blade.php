@foreach ($attributes as $attribute)
    @php
        $title = $attribute['title'] ?? '';
        $optionField = $attribute['option_field'] ?? null;
        $optionValue = $attribute['option_value'] ?? null;
        $type = $attribute['type'] ?? '';
        $name = $attribute['name'] ?? '';
        $dataField = $attribute['data_field'] ?? '';
        $dataModule = $attribute['data_module'] ?? '';
        $dataChannel = $attribute['data_channel'] ?? '';
        $isMultiple = $attribute['is_multiple'] ?? 0;
        $isRequired = $attribute['is_required'] ?? 0;
        $dataType = $attribute['data_type'] ?? '';
        $helpText = $attribute['help_text'] ?? '';
        $id = $attribute['id'] ?? '';
        $placeholder = $attribute['placeholder'] ?? '';
        $class = $attribute['class'] ?? 'form-control';
        $dataGet = $attribute['data_get'] ?? '';
        $id = $attribute['id'] ?? '';
    @endphp

    <div class="form-group row">
        <label class="col-lg-3 col-form-label">{{ $title }} @if (!empty($isRequired))
                <span style="color: red;">*</span>
            @endif </label>
        <div class="col-lg-9">
            @switch($optionField)
                @case('input')
                    @if ($type == 'file')
                        <input type="file" name="files" class="{{ $class }}"
                            data-field="{{ $isMultiple ? $name . '[]' : $name }}" data-channel="{{ env('STATIC_CHANNEL') }}"
                            data-type="file" id="{{ $id }}" @if (!empty($isMultiple)) multiple @endif
                            @if (!empty($isRequired)) required @endif>
                        @if (!empty($isMultiple))
                            @if (!empty($row[$name]))
                                @foreach ($row[$name] ?? [] as $k => $attachment)
                                    <div class="form-group row delete-file-{{ $k }}">
                                        <input type="hidden" name="{{ $isMultiple ? $name . '[]' : $name }}"
                                            value="{{ $attachment ?? '' }}">
                                    </div>
                                @endforeach
                            @endif
                        @else
                            <input id="image_field" type="hidden" name="{{ $name }}" value="{{ $row[$name] ?? '' }}">
                        @endif
                    @elseif($type == 'date')
                        <input type="text" name="{{ $name }}"
                            value="{{ !empty($row[$name]) ? date('d/m/Y', $row[$name]) : '' }}" autocomplete="off"
                            class="{{ $class }}" @if (!empty($isRequired)) required @endif>
                    @else
                        <input name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
                            class="{{ $class }}" value="{{ $row[$name] ?? '' }}" id="{{ $id }}"
                            @if (!empty($isRequired)) required @endif>
                    @endif

                    @if (!empty($helpText))
                        <small class="text-danger">{{ $helpText }}</small>
                    @endif
                @break

                @case('select')
                    @if (!empty($dataModule))
                        @if ($isMultiple)
                            <select name="{{ $isMultiple ? $name . '[]' : $name }}" class="{{ $class }}"
                                data-module="{{ $dataModule }}" @if (!empty($isMultiple)) multiple @endif
                                @if (!empty($isRequired)) required @endif>
                                @foreach ($row[$name] as $k => $v)
                                    <option value="{{ $v }}" selected>
                                        {{ $v }}</option>
                                @endforeach
                            </select>
                        @else
                            <select data-module="{{ $dataModule }}" class="{{ $class }}" name="{{ $name }}">
                                <option value="{{ $row[$name] ?? '' }}" selected="selected">
                                    {{ $row[$name] ?? '' }}
                                </option>
                            </select>
                        @endif
                    @else
                        <select name="{{ $isMultiple ? $name . '[]' : $name }}" id="{{ $id ?? '' }}"
                            data-get="{{ $dataGet ?? '' }}" class="{{ $class }}" data-module="{{ $dataModule ?? '' }}"
                            @if (!empty($isMultiple)) multiple @endif
                            @if (!empty($$isRequired)) required @endif>

                            @foreach (explode("\n", $optionValue ?? '') as $option)
                                @php
                                    $parts = explode(':', $option, 2);
                                    $value = trim($parts[0] ?? '');
                                    $text = trim($parts[1] ?? '');
                                @endphp
                                <option value="{{ $value }}" @if (isset($row[$name]) && $row[$name] == $value) selected @endif>
                                    {{ $text }}
                                </option>
                            @endforeach

                        </select>
                    @endif

                    @if (!empty($helpText))
                        <small class="text-danger">{{ $helpText }}</small>
                    @endif
                @break

                @case('checkbox')
                    @php
                        $options = explode("\n", $optionValue ?? '');
                        $nameWithBrackets = count($options) > 1 ? $name . '[]' : $name;
                    @endphp

                    @foreach ($options as $option)
                        @php
                            if (strpos($option, ':') !== false) {
                                [$value, $text] = explode(':', $option, 2);
                                $class = '';
                            } else {
                                $value = $option;
                                $text = '';
                            }
                        @endphp
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="{{ $class }}" name="{{ $nameWithBrackets }}"
                                    value="{{ $value }}" @if (!empty($row[$name]) && in_array($value, (array) $row[$name])) checked @endif>
                                {{ $text }}
                            </label>
                        </div>
                    @endforeach

                    @if (!empty($helpText))
                        <small class="text-danger">{{ $helpText }}</small>
                    @endif
                @break

                @default
                    <span>Unknown field type</span>
            @endswitch
        </div>
    </div>
@endforeach
