@if(isset($options->model) && isset($options->type))

    @if(class_exists($options->model))

        @php $relationshipField = $row->field; @endphp


        @if($options->type == 'belongsTo')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);
                    $query = $model::where($options->key,$relationshipData->{$options->column})->first();
                @endphp

                @if(isset($query))

                {{-- added linked --}}
                <a href="{{ route('voyager.'.$row->details->table.'.update',  $query->{$options->key}) }}"> 
                    <p>{{ $query->{$options->label} }} </p>                
                </a>
                
                @else
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @endif

            @else

                <select
                    class="form-control select2-ajax" name="{{ $options->column }}"
                    data-get-items-route="{{route('voyager.' . $dataType->slug.'.relation')}}"
                    data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
                    @if($row->required == 1) required @endif
                >
                    @php
                        $model = app($options->model);
                        $query = $model::where($options->key, old($options->column, $dataTypeContent->{$options->column}))->get();
                    @endphp

                    @if(!$row->required)
                        <option value="">{{__('voyager::generic.none')}}</option>
                    @endif

                    @foreach($query as $relationshipData)
                        <option value="{{ $relationshipData->{$options->key} }}" @if(old($options->column, $dataTypeContent->{$options->column}) == $relationshipData->{$options->key}) selected="selected" @endif>{{ $relationshipData->{$options->label} }}</option>
                    @endforeach
                </select>

            @endif

        @elseif($options->type == 'hasOne')

            @php
                $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                $model = app($options->model);
                $query = $model::where($options->column, '=', $relationshipData->{$options->key})->first();

            @endphp

            @if(isset($query))
                <p>{{ $query->{$options->label} }}</p>
            @else
                <p>{{ __('voyager::generic.no_results') }}</p>
            @endif

        @elseif($options->type == 'hasMany')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);
                    $selected_values = $model::where($options->column, $relationshipData->{$options->key})->get();
                @endphp

                  
                @if($view == 'browse')
                    @php
                        $string_values = implode(", ", $selected_values);
                        if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                    @endphp
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <p>{{ $string_values }}</p>
                    @endif
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <ul>
                            @foreach($selected_values as $selected_value)
                                {{-- added link  --}}
                                <div  style="display:flex; flex-direction: row;">
                                    <a href="{{ route('voyager.'.$row->details->table.'.update',  $selected_value->{$options->key}) }}"> 
                                        <li>{{ $selected_value->{$options->label} }}</li>
                                    </a> 
                                    <button 
                                        class="btn" 
                                        type="button" 
                                        id="btn" 
                                        style="padding: 2px; height: 20px; margin-left: 15px"
                                        >
                                            <i class="voyager-double-down"></i>
                                    </button>
                                </div>
                                {{-- table to display the details of kits --}}
                                <div class="table-responsive" id="tableDiv" style="display: block">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">name</th>
                                            <th scope="col">description</th>
                                            <th scope="col">approved</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>{{$selected_value->id}}</td>
                                            <td>{{$selected_value->name}}</td>
                                            <td>{{$selected_value->description}}</td>
                                            <td>{{$selected_value->approved}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            @endforeach
                        </ul>
                    @endif
                @endif

            @else

                @php
                    $model = app($options->model);
                    $query = $model::where($options->column, '=', $dataTypeContent->{$options->key})->get();
                @endphp

                @if(isset($query))
                    <ul>
                        @foreach($query as $query_res)
                            <li>{{ $query_res->{$options->label} }}</li>
                        @endforeach
                    </ul>

                @else
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @endif

            @endif

        @elseif($options->type == 'belongsToMany')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                    $selected_values = isset($relationshipData) ? $relationshipData
                    ->belongsToMany($options->model, $options->pivot_table, $options->foreign_pivot_key ?? null, $options->related_pivot_key ?? null, $options->parent_key ?? null, $options->key)
                    ->get()->map(function ($item, $key) use ($options) {
                        // added function by me
                        $data = array();
                        $name = $item->{$options->label};
                        $id = $item->{$options->key};
                        array_push($data, $name);
                        array_push($data, $id);
                        return $data;
            		})->all() : array();
                @endphp

                @if($view == 'browse')
                    @php
                        $string_values = implode(", ", $selected_values);
                        if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                    @endphp
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <p>{{ $string_values }}</p>
                    @endif
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <ul>
                            @foreach($selected_values as $selected_value)
                                  {{-- added link and fixing table name  --}}
                                @php
                                    $table = str_replace("_", "-",$row->details->table);
                                @endphp
                                <a href="{{ route('voyager.'.$table.'.update',  $selected_value[1]) }}"> 
                                    <li>{{ $selected_value[0] }}</li>
                                  
                                </a>
                            @endforeach
                        </ul>
                    @endif
                @endif

            @else
                <select
                    class="form-control select2-ajax @if(isset($options->taggable) && $options->taggable === 'on') taggable @endif"
                    name="{{ $relationshipField }}[]" multiple
                    data-get-items-route="{{route('voyager.' . $dataType->slug.'.relation')}}"
                    data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
                    @if(isset($options->taggable) && $options->taggable === 'on')
                        data-route="{{ route('voyager.'.\Illuminate\Support\Str::slug($options->table).'.store') }}"
                        data-label="{{$options->label}}"
                        data-error-message="{{__('voyager::bread.error_tagging')}}"
                    @endif
                    @if($row->required == 1) required @endif
                >

                        @php
                            $selected_keys = [];
                            
                            if (!is_null($dataTypeContent->getKey())) {
                                $selected_keys = $dataTypeContent->belongsToMany(
                                    $options->model,
                                    $options->pivot_table,
                                    $options->foreign_pivot_key ?? null,
                                    $options->related_pivot_key ?? null,
                                    $options->parent_key ?? null,
                                    $options->key
                                )->pluck($options->table.'.'.$options->key);
                            }
                            $selected_keys = old($relationshipField, $selected_keys);
                            $selected_values = app($options->model)->whereIn($options->key, $selected_keys)->pluck($options->label, $options->key);
                        @endphp

                        @if(!$row->required)
                            <option value="">{{__('voyager::generic.none')}}</option>
                        @endif

                        @foreach ($selected_values as $key => $value)
                            <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                        @endforeach

                </select>

            @endif

        @endif

    @else

        cannot make relationship because {{ $options->model }} does not exist.

    @endif

@endif

<script> 
    //window.onload = function(){
        var x = document.getElementById('tableDiv').style.display;
        var y = document.getElementById("btn").className;
        document.getElementById('btn').addEventListener("click" ,function()
        {   
            console.log('hi');
            (y == 'voyager-double-up')? 'voyager-double-up':'voyager-double-down';
            (x == 'none')? 'block':'none';
        });
    //}
</script>
