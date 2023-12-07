@foreach($products as $product)
    <div class="form-group row {{ $errors->has('school') ? 'has-error' : '' }}">
        @if($loop->iteration == 1)
            <label class="col-3">Products</label>
        @else
            <label class="col-3"></label>
        @endif
        <div class="col-9">
            <div class="checkbox-list">
                <label class="checkbox">
                    <input type="checkbox" class="product_checked" name="Checkboxes1"/>
                    <span></span>
                    {{$product->name}}
                </label>

                <div class="form-group mt-5 ml-6">
                    <label>{{$product->name}} Size</label>
                    <input type="hidden" name="" class="product_id" value="{{$product->id}}">
                    <input type="hidden" name="" class="product_name" value="{{$product->name}}">
                    <div class="radio-inline">
                        <label class="radio">
                            <input type="radio" checked sz="{{$product->name}} - small" value="{{$product->small}}" name="{{$product->id}}"/>
                            <span></span>
                            Small ($ {{$product->small}})
                        </label>
                        <label class="radio">
                            <input type="radio" sz="{{$product->name}} - medium"  value="{{$product->medium}}" name="{{$product->id}}"/>
                            <span></span>
                            Medium ($ {{$product->medium}})
                        </label>
                        <label class="radio">
                            <input type="radio" sz="{{$product->name}} - large"  value="{{$product->large}}" name="{{$product->id}}"/>
                            <span></span>
                            Large ($ {{$product->large}})
                        </label>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endforeach
