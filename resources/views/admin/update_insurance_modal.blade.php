<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Update Insurace Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="insurance_type_save" method="post" action="{{route('admin.insurance.update-types')}}"
                  class="form-group">
                @csrf
                <input type="hidden" name="id" value="{{$insurance->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                {{__('backend.insurance_type')}}
                                <input name="insurance_type_name" type="text"
                                       value="{{$insurance->insurance_type_name}}"
                                       class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control select2" style="width: 100%;">
                                <option value="1" selected="selected">Published</option>
                                <option value="0" selected="selected">Not Published</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Page Title
                                <input name="page_title" type="text" value="{{$insurance->page_title}}"
                                       class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Slug
                                <input type="text" value="{{$insurance->slug}}" name="slug" class="form-control">
                            </label>

                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Insurance Type Image
                        <input name="image" type="file" class="form-control">
                    </label>

                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Insurance Type Icon
                        <input name="icon" type="file" class="form-control">
                    </label>

                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Insurance Type Description
                    </label>
                    <textarea name="description" id="description">{{$insurance->description}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Meta Keywords
                    </label>
                    <textarea name="keywords" rows="2" cols="90" id=""></textarea>
                    <small>Seperated by commas</small>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Meta Description
                    </label>
                    <textarea name="meta_description" rows="2" cols="90" id=""></textarea>
                </div>


                <!-- /.form-group -->
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="save" type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
<script>

    CKEDITOR.replace('description');
</script>
<script>
    $(document).ready(function () {
        $('#save').click(function (e) {
            e.preventDefault();

            let myForm = document.getElementById('insurance_type_save');
            let formData = new FormData(myForm);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('admin.insurance.update-types')}}",
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                success: function (response) {
                    jQuery.each(response.errors, function (key, value) {
                        toastr.warning(value);
                    });
                    if (response.status == 'success') {
                        toastr.success(response.message);
                    }
                    if (response.status == 'error') {
                        toastr.error(response.message);

                    }
                },
                completed: function () {

                }
            });
        });

    });
</script>
