<!-- start add address Modal -->
<section class="modal  fade" id="newTicketModal" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
    <section class="modal-dialog modal-xl modal-dialog-centered">
        <section class="modal-content">
            <section class="modal-header">
                <h5 class="modal-title" id="add-address-label"><i class="fas fa-paper-plane"></i> ایجاد تیکت جدید</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </section>
            <section class="modal-body">
                <form id="address-form" class="row" action="{{route('customer.profile.ticket.my-tickets.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="col-md-6 mb-2">
                        <label for="subject" class="form-label mb-1">موضوع تیکت</label>
                        <input type="text" class="form-control form-control-sm" id="subject" name="subject" value="{{ old('subject') }}">
                        @error('subject')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>
                    <section class="col-md-6 mb-2">
                        <label for="category_id" class="form-label mb-1">دسته تیکت</label>
                        <select class="form-select form-select-sm" id="category_id" name="category_id">
                            <option disabled selected>دسته ای را انتخاب کنید</option>
                            @foreach ($ticketCategories as $ticketCategory)
                            <option value="{{$ticketCategory->id}}" @selected(old('category_id') == $ticketCategory->id) >{{$ticketCategory->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>
                    <section class="col-md-12 mb-2">
                        <label for="priority_id" class="form-label mb-1">اولویت</label>
                        <select class="form-select form-select-sm" id="priority_id" name="priority_id">
                            <option disabled selected>اولویتی را انتخاب کنید</option>
                            @foreach ($ticketPriorities as $ticketPriority)
                            <option value="{{$ticketPriority->id}}" @selected(old('priority_id') == $ticketPriority->id) >{{$ticketPriority->name}}</option>
                            @endforeach
                        </select>
                        @error('priority_id')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </section>

                    <section class="col-12 mb-2">
                        <label for="description" class="form-label mb-1">متن تیکت</label>
                        <section class="position-relative">
                            <textarea class="form-control form-control-sm" id="description" name="description" rows="8">{{ old('description') }}</textarea>
                            <div class="mb-3">
                                <label for="ticketAttachment" class="form-label attachment-ticket-lable"><i class="fas fa-paperclip"></i></label>
                                <label class="custom-file-label">ارسال پیوست ...</label>
                                <input class="form-control d-none" type="file" id="ticketAttachment" name="file_attachment">
                            </div>
                        </section>
                            @error('description')
                            <span class="text-danger font-size-12">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            <br>
                            @enderror
                            @error('file_attachment')
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
                <button type="button" onclick="document.getElementById('address-form').submit()" class="btn btn-sm btn-primary">ارسال تیکت</button>
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
            </section>
        </section>
    </section>
</section>
<!-- end add address Modal -->