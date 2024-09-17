<?php

namespace Attributes\Developer\Controllers;

use App\Http\Controllers\Controller;
use Attributes\Developer\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function renderHtml($row = [], $module)
    {
        $model = new Attribute();
        $attributes = $model->all(['module' => $module]);
        $data = [
            'row' => $row,
            'attributes' => $attributes ?? [],
        ];
        return view('attributes::attributes.render_html', $data);
    }    
    public function index(Request $request): mixed
    {
        $model = new Attribute();
        $input_data = $request->only('filter', 'page');
        $filter = \Arr::whereNotNull($input_data['filter'] ?? []);
        $option = ['pagination' => $input_data['page'] ?? 1];
        $rows = $model->all($filter, $option);
        $data = [
            'rows' => $rows,
            'pagination' => !empty($rows) ? $rows->setPath(\URL::current())->appends($input_data)->links() : '',
            'page' => isset($input_data['page']) ? $input_data['page'] : 1,
            'filter' => $input_data['filter'] ?? [],
        ];
        return view('attributes::attributes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'action' => route(\Config::get('route.as').'attributes.store'),
            'method' => 'POST',
        ];
        return view('attributes::attributes.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Attribute();
        $input_data = $request->only($this->onlyRequest);
        $validator = \Validator::make($input_data, [
            'title' => 'required',
            'option_value' => 'required',
            'name' => 'required',
            'type' => 'required',
            'module' => 'required',
            'class' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 200);
        }
        $name = $model->all(['name' => $input_data['name'], 'module' => $input_data['module']]);
        if (count($name) > 0) {
            return response()->json(['status' => 'error', 'message' => 'The name has already been taken.',], 400);
        }
        $result = $model->create($input_data);
        if (!$result) {
            return response()->json(['status' => 'error', 'message' => 'Không thành công!'], 200);
        }
        return response()->json(['status' => 'success', 'message' => 'Thêm thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Attribute();
        $row = $model->detail($id);
        if (!$row) {
            return abort(404);
        }
        $data = [
            'row' => $row,
        ];

        return view('attributes::attributes.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = (new Attribute())->detail($id);
        if (!$row) {
            return abort(404);
        }
        $data = [
            'row' => $row,
            'action' => route(\Config::get('route.as').'attributes.update',[$id]),
            'method' => 'PUT',
        ];

        return view('attributes::attributes.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $input_data = $request->only($this->onlyRequest);
        $validator = \Validator::make($input_data, [
            'title' => 'required',
            'option_value' => 'required',
            'name' => 'required',
            'type' => 'required',
            'module' => 'required',
            'class' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 200);
        }
        $model = new Attribute();
        $row = $model->detail($id);
        if (!$row) {
            return response()->json(['status' => 'error', 'message' => 'Phụ cấp không tồn tại'], 404);
        }
        $name = $model->all(['name' => $input_data['name'], 'module' => $input_data['module']])->toArray();
        if (count(array_filter($name, function ($item) use ($id) {
            return $item['_id'] != $id;
        })) > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'The name has already been taken.',
            ], 400);
        }
        if (empty($input_data['is_required'])) {
            $input_data['is_required'] = 0;
        }
        if (empty($input_data['is_multiple'])) {
            $input_data['is_multiple'] = 0;
        }
        $result = $model->update($id, $input_data);
        if (empty($result)) {
            return response()->json(['status' => 'error', 'message' => 'Dữ liệu không có sự thay đổi'], 200);
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $data = [
            'status' => 'error',
            'message' => 'Error',
        ];
        $model = new Attribute();
        if ($model->remove($id)) {
            $data['status'] = 'success';
            $data['message'] = 'Xóa thành công';
        }
        return response()->json($data, 200);
    }
}
