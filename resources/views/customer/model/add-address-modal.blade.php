<!-- start add address Modal -->
<section class="modal fade" id="add-address" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
    <section class="modal-dialog">
        <section class="modal-content">
            <section class="modal-header">
                <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </section>
            <section class="modal-body">
                <form id="address-form" class="row" action="{{route('customer.profile.address.add-address')}}" method="post">
                    @csrf
                    <section class="col-6 mb-2">
                        <label for="province" class="form-label mb-1">استان</label>
                        <select class="form-select form-select-sm" id="province" name="province_id">
                            <option disabled selected>استان را انتخاب کنید</option>
                            @foreach ($provinces as $province)
                            <option value="{{$province->id}}" data-url="{{ route('customer.sales-process.get-cities', $province->id)}}" @selected(old('province_id')==$province->id) >{{$province->name}}</option>
                            @endforeach
                        </select>
                        @error('province_id')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>
                    <section class="col-6 mb-2">
                        <label for="city" class="form-label mb-1">شهر</label>
                        <select class="form-select form-select-sm" id="city" name="city_id" data-old="{{old('city_id')}}">
                            <option disabled selected>شهر را انتخاب کنید</option>
                        </select>
                        @error('city_id')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>
                    <section class="col-12 mb-2">
                        <label for="address" class="form-label mb-1">نشانی</label>
                        <textarea class="form-control form-control-sm" id="address" name="address" placeholder="نشانی">{{ old('address') }}</textarea>
                        @error('address')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>

                    <section class="col-6 mb-2">
                        <label for="postal_code" class="form-label mb-1">کد پستی</label>
                        <input type="text" class="form-control form-control-sm" id="postal_code" name="postal_code" placeholder="کد پستی" value="{{ old('postal_code') }}">
                        @error('postal_code')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>

                    <section class="col-3 mb-2">
                        <label for="no" class="form-label mb-1">پلاک</label>
                        <input type="text" class="form-control form-control-sm number" id="no" name="no" placeholder="پلاک" value="{{ old('no') }}">
                        @error('no')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>

                    <section class="col-3 mb-2">
                        <label for="unit" class="form-label mb-1">واحد</label>
                        <input type="text" class="form-control form-control-sm number" id="unit" name="unit" placeholder="واحد" value="{{ old('unit') }}">
                        @error('unit')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>

                    <section class="border-bottom mt-2 mb-3"></section>

                    <section class="col-12 mb-2">
                        <section class="form-check">
                            <section>
                                <input class="form-check-input" type="checkbox" name="receiver" id="receiver" @checked(old('receiver')=='on' ) >
                                <label class="form-check-label" for="receiver">
                                    گیرنده سفارش خودم هستم
                                </label>
                            </section>
                        </section>
                    </section>

                    <section class="col-6 mb-2">
                        <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                        <input type="text" class="form-control form-control-sm" id="first_name" name="recipient_first_name" placeholder="نام گیرنده" value="{{ old('recipient_first_name') }}">
                        @error('recipient_first_name')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>

                    <section class="col-6 mb-2">
                        <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                        <input type="text" class="form-control form-control-sm" id="last_name" name="recipient_last_name" placeholder="نام خانوادگی گیرنده" value="{{ old('recipient_last_name') }}">
                        @error('recipient_last_name')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>

                    <section class="col-6 mb-2">
                        <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                        <section class="input-group input-group-sm">
                            <input type="text" style="direction: ltr;" class="form-control form-control-sm text-end" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="(9××) ××× ××××">
                            <span class="input-group-text" id="deliver-price">+98</span>
                        </section>
                        @error('mobile')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>
                </form>
            </section>
            <section class="modal-footer py-1">
                <button type="button" onclick="document.getElementById('address-form').submit()" class="btn btn-sm btn-primary">ثبت آدرس</button>
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
            </section>
        </section>
    </section>
</section>
<!-- end add address Modal -->