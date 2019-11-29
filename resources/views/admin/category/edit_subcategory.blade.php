@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <a class="breadcrumb-item" href="{{ route('sub.categories') }}">Sub-Category</a>
        <span class="breadcrumb-item active">Update</span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub-Category Update</h6>
          <div class="table-wrapper">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            
            <form action="{{ url('update/subcategory/'.$subcategory->id) }}" method="post">
              @csrf
                  <div class="modal-body pd-35">
                    <div class="row">
                      <label class="col-sm-12 form-control-label">Category: <span class="tx-danger">*</span></label>
                      <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="category_id" id="" >
                          @foreach($category as $row)
                          <option value="{{ $row->id }}" <?php if ($row->id == $subcategory->category_id){
                            echo "selected";
                          } ?>>{{ $row->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div><!-- row --> <br>
                    <div class="row">
                      <label class="col-sm-12 form-control-label">Sub-Category Name: <span class="tx-danger">*</span></label>
                      <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="subcategory_name" value="{{ $subcategory->subcategory_name }}" >
                      </div>
                    </div><!-- row -->
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Update</button>
                  </div>
            </form>
          </div><!-- table-wrapper -->
        </div>

      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    

@endsection