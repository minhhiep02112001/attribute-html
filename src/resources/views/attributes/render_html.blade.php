@foreach ($attributes as $attribute)
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">{{ $attribute['title'] ?? '' }}</label>
        <div class="col-lg-9">
            @if ($attribute['option_value'] == 'input')
                <input name="{{ $attribute['name'] ?? '' }}" data-field="{{ $attribute['data_field'] ?? '' }}"
                    data-channel="{{ $attribute['data_channel'] ?? '' }}" data-type="{{ $attribute['data_type'] ?? '' }}"
                    data-value="{{ $row['images'] ?? '' }}" type="{{ $attribute['type'] ?? 'text' }}"
                    placeholder="{{ $attribute['placeholder'] ?? '' }}"
                    class="{{ $attribute['class'] ?? 'form-control' }}" value="{{ $row[$attribute['name']] ?? '' }}"
                    id="{{ $attribute['id'] ?? '' }}" @if ($attribute['is_required']) required @endif>

                @if (!empty($attribute['type']) && $attribute['type'] == 'file')
                    <input id="image_field" type="hidden" name="{{ $attribute['name'] ?? '' }}"
                        value="{{ $row[$attribute['name']] ?? '' }}">
                @endif

                @if (!empty($attribute['help_text']))
                    <small class="form-text text-muted">{{ $attribute['help_text'] }}</small>
                @endif
            @elseif ($attribute['option_value'] == 'select')
                <select name="{{ $attribute['name'] ?? '' }}" id="{{ $attribute['id'] ?? '' }}"
                    data-get="{{ $attribute['data_get'] ?? '' }}" class="{{ $attribute['class'] ?? 'form-control' }}"
                    data-module="{{ $attribute['data_module'] ?? '' }}"
                    @if ($attribute['is_multiple']) multiple @endif @if ($attribute['is_required']) required @endif>

                    @if (!empty($row[$attribute['name']]))
                        <option value="{{ $row[$attribute['name']] }}" selected>{{ $row[$attribute['name']] }}
                        </option>
                    @endif
                </select>

                @if (!empty($attribute['help_text']))
                    <small class="form-text text-muted">{{ $attribute['help_text'] }}</small>
                @endif
            @elseif ($attribute['option_value'] == 'checkbox')
                <input type="checkbox" id="{{ $attribute['id'] ?? '' }}" name="{{ $attribute['name'] ?? '' }}"
                    class="{{ $attribute['class'] ?? 'form-control' }}"
                    @if (isset($row[$attribute['name']]) && $row[$attribute['name']] == 1) checked @endif
                    @if ($attribute['is_required']) required @endif>

                @if (!empty($attribute['help_text']))
                    <small class="form-text text-muted">{{ $attribute['help_text'] }}</small>
                @endif
            @endif
        </div>
    </div>
@endforeach
