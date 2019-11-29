@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <a class="breadcrumb-item" href="{{ route('categories') }}">Category</a>
        <span class="breadcrumb-item active">Sub-Category</span>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub-Category List
          	<a href="#" class="btn btn-warning" style="float:right;" data-toggle="modal" data-target="#modaldemo1">Add New</a>
      	  </h6>
			
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Category name</th>
                  <th class="wd-15p">Sub-Category Name</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($subcat as $row)
                <tr>
                  <td>{{ $row->category_name }}</td>
                  <td>{{ $row->subcategory_name }}</td>
                  <td>
                  	<a href="{{ URL::to('edit/subcategory/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                  	<a href="{{ URL::to('delete/subcategory/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- BASIC MODAL -->
    <div id="modaldemo1" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Sub-Category Add</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    			@if ($errors->any())
    			    <div class="alert alert-danger">
    			        <ul>
    			            @foreach ($errors->all() as $error)
    			                <li>{{ $error }}</li>
    			            @endforeach
    			        </ul>
    			    </div>
    			@endif
          <form action="{{ route('store.subcategory') }}" method="post">
          	@csrf
	          <div class="modal-body pd-35">

            <div class="row">
              <label class="col-sm-12 form-control-label">Category: <span class="tx-danger">*</span></label>
              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                <select class="form-control" name="category_id" id="" required>
                  @foreach($category as $row)
                  <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                  @endforeach
                </select>
              </div>
            </div><!-- row --> <br>
		        <div class="row">
		          <label class="col-sm-12 form-control-label">Sub-Category Name: <span class="tx-danger">*</span></label>
		          <div class="col-sm-12 mg-t-10 mg-sm-t-0">
		            <input type="text" class="form-control" name="subcategory_name" placeholder="Enter Sub-Catergory Name" required>
		          </div>
		        </div><!-- row -->
            

	          </div>
	          <div class="modal-footer">
	            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
	            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
	          </div>
		  </form>

        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection